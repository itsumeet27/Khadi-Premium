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
			$this->Ln(35);
		}
		function headerTable(){
			$this->SetFont('Arial','B',12);
			$this->Cell(40,10,'SKU',1,0,'C');
			$this->Cell(100,10,'Item',1,0,'C');
			$this->Cell(70,10,'Price (Before GST) in INR',1,0,'C');
			$this->Cell(50,10,'GST (18%) in INR',1,0,'C');
			$this->Cell(70,10,'Price (After GST) in INR',1,0,'C');
			$this->Cell(30,10,'Quantity',1,0,'C');
			$this->Cell(40,10,'Total in INR',1,0,'C');
			$this->Ln();
		}
		function viewTable($db){
			$this->SetFont('Arial','',12);
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
				$this->Cell(70,10,ceil(($product['price']*100)/118),1,0,'C');
				$this->Cell(50,10,intval(0.18*(($product['price']*100)/118)),1,0,'C');
				$this->Cell(70,10,$product['price'],1,0,'C');
				$this->Cell(30,10,$product['quantity'],1,0,'C');
				$this->Cell(40,10,$product['price']*$product['quantity'],1,0,'C');
				$this->Ln();
			}
		}
		function total($db){
			$txn_id = sanitize((int)$_GET['txn_id']);
			$txnQuery = $db->query("SELECT * FROM transactions WHERE id = '{$txn_id}'");
			$txn = mysqli_fetch_assoc($txnQuery);
			$cart_id = $txn['cart_id'];
			$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
			$cart = mysqli_fetch_assoc($cartQ);
			$this->SetFont('Arial','B',12);
			$this->Cell(40,10,'Total in INR',1,0,'C');
			$this->Cell(100,10,'',1,0,'C');
			$this->Cell(70,10,'',1,0,'C');
			$this->Cell(50,10,'',1,0,'C');
			$this->Cell(70,10,'',1,0,'C');
			$this->Cell(30,10,'',1,0,'C');
			$this->Cell(40,10,$txn['total'],1,0,'C');
		}
	}
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
	$pdf = new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('C','A3',0);
	$pdf->Ln();
	//Invoice header
	$pdf->SetFont('Arial','B', 16);
	//Cell (width, height, text, border, endline, align)
	$pdf->Cell(260,15,'Luka Enterprises', 0,0);
	$pdf->Cell(140,15,'Invoice', 0,1);
	//Contents for Invoice Header
	$pdf->SetFont('Arial', '', 12);
	$pdf->Cell(260,10,'954, Riddhi Siddhi Society, Adarsh Nagar, Off link road, Near Lotus Petrol Pump',0,0);
	$pdf->Cell(140,10,'Invoice No: '.$txn_id,0,1);
	$pdf->Cell(260,10,'Andheri West, Mumbai-400058',0,0); 
	$pdf->Cell(140,10,'Date: '.$txn['txn_date'],0,1);
	$pdf->Cell(260,10,'Contact: 9619531115',0,0);
	$pdf->Cell(140,10,'',0,1);
	$pdf->Cell(260,10,'Email: support@khadipremium.in',0,0);
	$pdf->Cell(140,10,'',0,1);
	$pdf->Cell(260,10,'GST: 27AJGPL8730P1ZJ',0,1);
	//Blank Line
	$pdf->Cell(340,10,'',0,1);
	//Billing Address
	$pdf->SetFont('Arial','B', 14);
	$pdf->Cell(260,10,'Bill To: '.$txn['firstname'],0,1);
	$pdf->SetFont('Arial','', 12);
	$pdf->Cell(260,10,$txn['address1'],0,1);
	$pdf->Cell(260,10,$txn['address2'],0,1);
	$pdf->Cell(260,10,$txn['city'].'-'.$txn['zipcode'],0,1);
	$pdf->Cell(260,10,'Contact: '.$txn['phone'],0,1);
	$pdf->Cell(260,10,'Email: '.$txn['email'],0,1);
	//Orders
	$pdf->SetFont('Arial','B', 16);
	$pdf->Cell(400,15,'Your Orders',0,1,'C');
	$pdf->headerTable();
	$pdf->viewTable($db);
	$pdf->total($db);
	$pdf->Ln(15);
	
	//Footer
	$pdf->SetFont('Arial','B', 14);
	$pdf->Cell(240,10,'*Khadi Premium Cosmetics is promoted and managed by: ',0,0,'R');
	$pdf->Cell(160,10,'Luka Enterprises',0,1,'L');
	$pdf->Output();
?>
