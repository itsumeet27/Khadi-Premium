<?php 
	include('core/init.php');
?>
<?php
  $ip = getIp();
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM customers WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $cus_id = $row_pro['id'];
          $cus_name = $row_pro['fullname'];
          $cus_email = $row_pro['email'];
          $cus_address1 = $row_pro['address1'];
          $cus_address2 = $row_pro['address2'];
          $cus_city = $row_pro['city'];
          $cus_state = $row_pro['state'];
          $cus_zipcode = $row_pro['zipcode'];
          $cus_phone = $row_pro['phone'];
          $cus_country = $row_pro['country'];
    }
    $order = "SELECT * FROM orders WHERE cid = '$cus_id' AND paid = 1";
    $run_order = $db->query($order);
    $i = 0;
    while($get_order = mysqli_fetch_array($run_order)){
      $order_id = $get_order['id'];
      $order_info = $get_order['productinfo'];
      $order_total = $get_order['total'];
      $order_date = $get_order['order_date'];
      $order_status = $get_order['shipped'];
      $order_invoice = $get_order['invoice'];

      $transaction = "SELECT * FROM transactions WHERE email = '$email'";
      $run_transaction = $db->query($transaction);
      $get_transaction = mysqli_fetch_array($run_transaction);

      $transaction_id = $get_transaction['id'];
      $txnid = $get_transaction['txnid'];
    }
?>

<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Your Orders</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid table-responsive">
        <table class="table table-condensed table-bordered">
          <thead>
            <th><b>ID</b></th>
            <th><b>Product Info</b></th>
            <th><b>Total Amount</b></th>
            <th><b>Order Date</b></th>
            <th><b>Transaction ID</b></th>
            <th><b>Order Status</b></th>
            <th><b>Invoice</b></th>
          </thead>
          <tbody>
            <td>
              <?php echo $order_id; ?>
            </td>
            <td>
              <?php echo nl2br($order_info); ?>
            </td>
            <td>
              <?php echo '&#8377; '. $order_total; ?>
            </td>
            <td>
              <?php echo $order_date; ?>
            </td>
            <td>
              <?php echo $txnid; ?>
            </td>
            <td>
              <?php if($order_status == 0){ echo "In Progress"; } else{ echo "Order Shipped"; } ?>
            </td>
            <td>
              <a href="admin/invoice.php?txn_id=<?php echo $transaction_id; ?>" class="btn btn-xs" style="color: #fff;background: #1c2a48">Download</a>
            </td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>