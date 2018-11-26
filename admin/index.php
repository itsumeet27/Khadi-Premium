<?php
	require_once '../core/init.php';
	if(!is_logged_in()){
		login_error_redirect();
	}
	include('includes/head.php');
?>

<!-- Orders to Fill -->

<?php 
	$txnQuery = "SELECT * FROM orders WHERE paid = 1";
	$txnResults = $db->query($txnQuery);
?>
<?php 
	$invoiceQuery = "SELECT t.id, t.cart_id, t.fullname, t.email, t.phone, t.address1, t.address2, t.city, t.zipcode, t.productinfo, t.txn_date, t.total, c.items, o.paid FROM transactions t INNER JOIN cart c ON t.cart_id = c.id INNER JOIN orders o ON t.fullname = o.fullname WHERE o.paid = 1 ORDER BY t.txn_date";
	$invoiceResults = $db->query($invoiceQuery);
?>

	<div id="about" class="view" style="height: 50%;background: url('../img/2054.jpg')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
      <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          <div class="row d-flex justify-content-center text-center">
            <div class="">
              <!-- Heading -->
              <a href=""><h1 class="white-text h1-responsive">Admin Panel</h1></a>
            </div>
          </div>
        </div>
      </div>
    </div>
	<div class="container-fluid">
		<div class="px-3 py-3">
			<!-- Orders to Ship -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive card">
				<div class="card-header">
					<h3 class="text-center">Orders to Ship</h3>
				</div>
				<div class="card-body">
					<table class="table table-condensed table-bordered table-striped" style="display: table;">
						<thead>
							<th></th>
							<th><h5 class="h5-responsive"><b>Invoice</b></h5></th>
							<th><h5 class="h5-responsive"><b>Name</b></h5></th>
							<th><h5 class="h5-responsive"><b>Product (s)</b></h5></th>
							<th><h5 class="h5-responsive"><b>Total</b></h5></th>
							<th><h5 class="h5-responsive"><b>Order Status</b></h5></th>
							<th><h5 class="h5-responsive"><b>IP Address</b></h5></th>
							<th><h5 class="h5-responsive"><b>Date</b></h5></th>
						</thead>
						<tbody>
							<?php while($order = mysqli_fetch_assoc($txnResults)): ?>
								<tr>
									<td><a href="orders.php?txn_id=<?=$order['id'];?>" class="btn btn-xs" style="color: #fff;background: #1c2a48">Details</a></td>
									<td><?=$order['invoice'];?></td>
									<td><?=$order['fullname'];?></td>
									<td><?=nl2br($order['productinfo']);?></td>
									<td><?=money($order['total']);?></td>
									<td><?php if($order['shipped'] == 0){ echo "In Progress"; } else{ echo "Order Shipped"; } ?></td>
									<td><?=$order['ip_add'];?></td>
									<td><?=date($order['order_date']);?></td>
								</tr>
							<?php endwhile;?>
						</tbody>
					</table>
				</div>
			</div><br>
			<!-- Invoice Details -->
			<div class="col-md-12 table-responsive card">
				<div class="card-header">
					<h3 class="text-center">Invoice</h3>
				</div>
				<div class="card-body">
					<table class="table table-condensed table-bordered table-striped" style="display: table;">
						<thead>
							<th><h6 class="h6-responsive"><b></b></h6></th>
							<th><h6 class="h6-responsive"><b>Name</b></h6></th>
							<th><h6 class="h6-responsive"><b>Email</b></h6></th>
							<th><h6 class="h6-responsive"><b>Phone</b></h6></th>
							<th colspan="2"><h6 class="h6-responsive"><b>Address</b></h6></th>
							<th><h6 class="h6-responsive"><b>City</b></h6></th>
							<th><h6 class="h6-responsive"><b>Zipcode</b></h6></th>
							<th><h6 class="h6-responsive"><b>Product (s)</b></h6></th>
							<th><h6 class="h6-responsive"><b>Total</b></h6></th>
							<th><h6 class="h6-responsive"><b>Date</b></h6></th>
						</thead>
						<tbody>
							<?php while($invoice = mysqli_fetch_assoc($invoiceResults)): ?>
								<tr>
									<td><a href="invoice.php?txn_id=<?=$invoice['id'];?>" class="btn btn-xs" style="color: #fff;background: #1c2a48">Details</a></td>
									<td><?=$invoice['fullname'];?></td>
									<td><?=$invoice['email'];?></td>
									<td><?=$invoice['phone'];?></td>
									<td><?=$invoice['address1'];?></td>
									<td><?=$invoice['address2'];?></td>								
									<td><?=$invoice['city'];?></td>
									<td><?=$invoice['zipcode'];?></td>
									<td><?=nl2br($invoice['productinfo']);?></td>
									<td><?=money($invoice['total']);?></td>
									<td><?=date($invoice['txn_date']);?></td>
								</tr>
							<?php endwhile;?>
						</tbody>
					</table>
				</div>	
			</div><br>
		</div>

		<!-- Sales By Month -->
		<div class="row">
			<?php
				$thisYear = date("Y");
				$lastYear = $thisYear-1;
				$thisYearQ = $db->query("SELECT total, txn_date FROM transactions WHERE YEAR(txn_date) = '{$thisYear}'");
				$lastYearQ = $db->query("SELECT total, txn_date FROM transactions WHERE YEAR(txn_date) = '{$lastYear}'");
				$current = array();
				$last = array();
				$currentTotal = 0;
				$lastTotal = 0;
				while ($x = mysqli_fetch_assoc($thisYearQ)) {
					$month = date("m", strtotime($x['txn_date']));
					if(!array_key_exists($month, $current)){
						$current[(int)$month] = $x['total'];
					}
					else{
						$current[(int)$month] += $x['total'];
					}
					$currentTotal += $x['total'];
				}
				while ($y = mysqli_fetch_assoc($lastYearQ)) {
					$month = date("m", strtotime($y['txn_date']));
					if(!array_key_exists($month, $last)){
						$last[(int)$month] = $y['total'];
					}
					else{
						$last[(int)$month] += $y['total'];
					}
					$lastTotal += $y['total'];
				}
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive card">
				<div class="card-header">
					<h3 class="text-center">Sales by Month</h3>
				</div>
				<div class="card-body">
					<table class="table table-condensed table-striped table-bordered" style="display: table;">
						<thead>
							<th></th>
							<th><h5 class="h5-responsive"><b><?=$lastYear;?></b></h5></th>
							<th><h5 class="h5-responsive"><b><?=$thisYear;?></b></h5></th>
						</thead>
						<tbody>
							<?php for($i=1;$i<=12;$i++): 
								$dt = DateTime::createFromFormat('!m',$i);
							?>
								<tr<?=(date("m") == $i)?' class="info"':'';?>>
									<td><h6 class="h6-responsive"><b><?=$dt->format("F");?></b></h6></td>
									<td><?=(array_key_exists($i, $last))?money($last[$i]):money(0);?></td>
									<td><?=(array_key_exists($i, $current))?money($current[$i]):money(0);?></td>
								</tr>
							<?php endfor; ?>
							<tr>
								<td><h6 class="h6-responsive"><b>Total</b></h6></td>
								<td><?=money($lastTotal);?></td>
								<td><?=money($currentTotal);?></td>
							</tr>
						</tbody>
					</table>
				</div>				
			</div>
		</div>
	</div>

<?php
	include 'includes/footer.php';
?>