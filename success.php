<?php
  require_once 'core/init.php';
  $cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'")
?>

<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$phone=sanitize($_POST["phone"]);
$address1=sanitize($_POST["address1"]);
$address2=sanitize($_POST["address2"]);
$city=sanitize($_POST["city"]);
$state=sanitize($_POST["state"]);
$country=sanitize($_POST["country"]);
$zipcode=sanitize($_POST["zipcode"]);
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
		   } else {
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
          $db->query("UPDATE cart SET paid = 1 WHERE id = '{$cart_id}'");
          $db->query("INSERT INTO transactions (cart_id,firstname,email,phone,address1,address2,city,state,country,zipcode,total,productinfo) VALUES ('$cart_id','$firstname','$email','$phone','$address1','$address2','$city','$state','$country','$zipcode','$amount','$productinfo')");
		   }
?>	