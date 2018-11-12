<?php 
	require_once '../core/init.php';
	include('includes/head.php');
?>

<?php
	if(isset($_POST['generate_pdf'])){
		require_once('tcpdf/tcpdf.php');
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$obj_pdf -> SetCreator(PDF_CREATOR);
		$obj_pdf -> SetTitle("Product Invoice");
		$obj_pdf -> SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
		$obj_pdf -> setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$obj_pdf -> setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$obj_pdf -> SetDefaultMonospacedFont('helvetica');
		$obj_pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
		$obj_pdf -> SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
		$obj_pdf -> setPrintHeader(false);
		$obj_pdf -> setPrintFooter(false);
		$obj_pdf -> SetAutoPageBreak(TRUE, 10);
		$obj_pdf -> SetFont('helvetica','',11);
		$obj_pdf -> AddPage();
		$content = '';
		$obj_pdf -> writeHtml($content);
		$obj_pdf -> Output('file.pdf', 'I');
	}
?>

<?php 
	$invoiceQuery = "SELECT t.id, t.cart_id, t.firstname, t.email, t.phone, t.address1, t.address2, t.city, t.zipcode, t.productinfo, t.txn_date, t.total, c.items, c.paid FROM transactions t LEFT JOIN cart c ON t.cart_id = c.id WHERE c.paid = 1 ORDER BY t.txn_date";
	$invoiceResults = $db->query($invoiceQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Generate Invoice</title>
</head>
<body>
	<div class='container-fluid'>
		<div class='table-responsive'>
			<form method="post">
				<input type='submit' name='generate_pdf' value='Generate PDF' class='btn btn-success' />
			</form>
			<table class='table table-responsive table-bordered table striped'>
				<thead>
					<h4 class='text-center'>Khadi Premium Cosmetics</h4>
					<h5 class='text-center'>Contact: +91 9619531115</h5>
					<h5 class='text-center'>Email: <a href='mailto:support@khadipremium.in'>support@khadipremium.in</a></h5>
					<h5 class='text-center'>Facebook/Instagram: @khadipremium</h5>
				</thead>				
				<tbody>
					<?php while($invoice = mysqli_fetch_assoc($invoiceResults)): ?>
					<tr>
						<td><b>Order No:</b> <?=$invoice['id'];?></td>
						<td><b>Date:</b> <?=$invoice['txn_date'];?></td>
					</tr>
					<tr>
						<td><b>Details of Customer:</b> </td>
						<td><b>Details of Supplier:</b> </td>
					</tr>
					<tr>
						<td><b>Name:</b> <?=$invoice['firstname'];?></td>
						<td><b>Name:</b> Luka Enterprises</td>
					</tr>
					<tr>
						<td><b>Contact:</b> <?=$invoice['phone'];?></td>
						<td><b>Contact:</b> 9619531115</td>
					</tr>
					<tr>
						<td><b>Address:</b> 
							<address>
								<?=$invoice['address1'];?><br>
								<?=$invoice['address2'];?>
							</address>
						</td>
						<td><b>Address:</b> 
							<address>
								954, Riddhi Siddhi Society,<br>
								Adarsh Nagar, Off Link Road,<br>
								Near Lotus Petrol Pump,<br>
								Jogeshwari West, Mumbai - 400102
							</address>
						</td>
					</tr>
					<?php endwhile;?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

<?php include('includes/footer.php');?>