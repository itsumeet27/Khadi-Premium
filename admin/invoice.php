<?php 
	require_once '../core/init.php';
?>

<?php 
	$invoiceQuery = "SELECT t.id, t.cart_id, t.firstname, t.email, t.phone, t.address1, t.address2, t.city, t.zipcode, t.productinfo, t.txn_date, t.total, c.items, c.paid FROM transactions t LEFT JOIN cart c ON t.cart_id = c.id WHERE c.paid = 1 ORDER BY t.txn_date";
	$invoiceResults = $db->query($invoiceQuery);
?>

<?php
	
?>
<?php
	include('fpdf/fpdf.php');
	/**
	 * 
	 */

	class myPDF extends FPDF
	{
		
		function header()
		{
			$this->Image('../images/Luka.jpg',12,8);
			$this->Ln(40);
		}

		function headerTable(){
			$this->SetFont('Times','B',14);
			$this->Cell(40,10,'SKU',1,0,'C');
			$this->Cell(100,10,'Item',1,0,'C');
			$this->Cell(50,10,'Price (Before GST)',1,0,'C');
			$this->Cell(30,10,'GST (18%)',1,0,'C');
			$this->Cell(50,10,'Price (After GST)',1,0,'C');
			$this->Cell(30,10,'Quantity',1,0,'C');
			$this->Cell(40,10,'Total',1,0,'C');
			$this->Ln();
		}

		function viewTable($db){
			$this->SetFont('Times','',14);
			$txn_id = sanitize((int)$_GET['txn_id']);
			$txnQuery = $db->query("SELECT * FROM transactions WHERE id = '{$txn_id}'");
			$txn = mysqli_fetch_assoc($txnQuery);
			$cart_id = $txn['cart_id'];
			$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
			$cart = mysqli_fetch_assoc($cartQ);
			$items = json_decode($cart['items'],true);
			$idArray = array();
			$products = array();
			foreach($items as $item){
				$idArray[] = $item['id'];
			}
			$ids = implode(',',$idArray);
			$productQ = $db->query("SELECT i.id as 'id', i.sku as 'sku', i.price as 'price', i.title as 'title', c.id = 'cid', c.category as 'child', p.category as 'parent' FROM products i LEFT JOIN categories c ON i.categories = c.id LEFT JOIN categories p ON c.parent = p.id WHERE i.id IN ({$ids})");
			while ($p = mysqli_fetch_assoc($productQ)) {
				foreach($items as $item){
					if($item['id'] == $p['id']){
						$x = $item;
						continue;
					}
				}
				$products[] = array_merge($x, $p);
			}
			foreach($products as $product){
				$this->Cell(40,10,$product['sku'],1,0,'C');
				$this->Cell(100,10,$product['title'],1,0,'C');
				$this->Cell(50,10,ceil(($product['price']*100)/118),1,0,'C');
				$this->Cell(30,10,intval(0.18*(($product['price']*100)/118)),1,0,'C');
				$this->Cell(50,10,$product['price'],1,0,'C');
				$this->Cell(30,10,$product['quantity'],1,0,'C');
				$this->Cell(40,10,$product['price']*$product['quantity'],1,0,'C');
				$this->Ln();
			}
		}

		function footerTable($db){
			$txn_id = sanitize((int)$_GET['txn_id']);
			$txnQuery = $db->query("SELECT * FROM transactions WHERE id = '{$txn_id}'");
			$txn = mysqli_fetch_assoc($txnQuery);
			$cart_id = $txn['cart_id'];
			$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
			$cart = mysqli_fetch_assoc($cartQ);
			$this->SetFont('Times','B',14);
			$this->Cell(40,10,'Total',1,0,'C');
			$this->Cell(100,10,'',1,0,'C');
			$this->Cell(50,10,'',1,0,'C');
			$this->Cell(30,10,'',1,0,'C');
			$this->Cell(50,10,'',1,0,'C');
			$this->Cell(30,10,'',1,0,'C');
			$this->Cell(40,10,$txn['total'],1,0,'C');
		}
	}

	$pdf = new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('C','A3',0);
	$pdf->headerTable();
	$pdf->viewTable($db);
	$pdf->footerTable($db);
	$pdf->Output();
?>


