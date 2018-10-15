<?php
  require_once 'core/init.php';
  $cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'")
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="U5A5zpZYXd";
// Salt should be same Post Request 
If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
     $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
         echo "Invalid Transaction. Please try again";
        ?>
    <div class="container">
       <div class="modal fade text-center" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title text-center">Successful Payment</h2>
            </div>
            <div class="modal-body">
              <?php } else {
                echo "<h3>Thank You. Your order status is ". $status .".</h3>";
                echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
                echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

                //Adjust Inventory

                $itemQ = $db->query("SELECT * FROM cart WHERE id = '$cart_id'");
                $iresults = mysqli_fetch_assoc($itemQ);
                $items = json_decode($iresults['items'],true);
                

                //Update Cart

                $db->query("UPDATE cart SET paid = 1 WHERE id = '{$cart_id}'");
                
             }?>
            </div>
            <div class="modal-footer">
              <a href="products.php" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Continue Shopping</a>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
</body>
</html>