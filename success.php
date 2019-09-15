<?php
  include('includes/header.php');
  require_once 'core/init.php';
  $cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
  $runCart = mysqli_fetch_assoc($cartQ);
  $cart_id = $runCart['id'];
?>
  <div id="about" class="view" style="height: 50%;background: url('img/ban.JPG')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20em 2em">
    <div class="mask rgba-black-strong">
      <div class="container-fluid d-flex align-items-center justify-content-center h-100">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-md-10">
            <a href=""><img src="img/Logo.png" class="img-fluid" style="width: 400px;"></a>
            <hr class="hr-light">
            <h4 class="white-text my-4 h1-responsive" style="font-family: 'Cookie', cursive;">Order Success</h4>
            <a href="products.php" class="btn btn-outline-white">Shop More<i class="fa fa-shopping-cart ml-2"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
$status=$_POST['status'];
$firstname=$_POST['firstname'];
$amount=$_POST['amount'];
$txnid=$_POST['txnid'];
$posted_hash=$_POST['hash'];
$key=$_POST['key'];
$productinfo=$_POST['productinfo'];
$email=$_POST['email'];
$phone=sanitize($_POST['phone']);
$address1=sanitize($_POST['address1']);
$address2=sanitize($_POST['address2']);
$city=sanitize($_POST['city']);
$state=$_POST['state'];
$country=$_POST['country'];
$zipcode=sanitize($_POST['zipcode']);
$salt='U5A5zpZYXd';


// Salt should be same Post Request 
If (isset($_POST['additionalCharges'])) {
       $additionalCharges=$_POST['additionalCharges'];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash('sha512', $retHashSeq);
       if ($hash != $posted_hash) {
	       echo 'Invalid Transaction. Please try again';
		   } else {
          echo "
          <div class='container-fluid py-4'>
            <div class='card'>
              <div class='card-header' style='background: #6b5523;'>
                <h3 class='h3-responsive text-center white-text'><b>Congratulations, your order is placed successfully!</b></h3>
              </div>
              <div class='card-body'>
                <h5 class='h5-responsive px-2 py-3' style='text-align: justify;line-height: 1.5em'>
                  Greetings, from Khadi Premium Cosmetics. We hope you like our product and continue shopping with us!
                </h5>
                <h5 class='h5-responsive px-2 py-1' style='text-align: justify;line-height: 1.5em'>The status of your order is: <b style='color: green;'>'. $status .'</b>, and the corresponding transaction ID is: <b style='color: green;'>'.$txnid.'</b>.</h5>
                <h5 class='h5-responsive px-2 py-1' style='text-align: justify;line-height: 1.5em'>We have received a payment of Rs. <b style='color: green;'>' . $amount . '</b>. Your order will soon be shipped. You can also read about our blogs <a href='blogs.php'>here</a>.</h5>
              </div>
              <div class='card-footer' style='background-color: #c0a567'>
                <h5 class='h5-responsive text-center'><b>Continue your shopping with us. </b><a href='products.php' style='margin: 0;cursor: pointer;border:none;border-radius: 10em;background: #6b5523;color:#fff' class='btn btn-md'>SHOP NOW &nbsp;<i class='fa fa-cart-plus'></i></a></h5>
              </div>
            </div>
          </div>
          ";
          
          $invoice = mt_rand();
          $ip = getIp();
          $customer = $db->query("SELECT * FROM customers");
          $cusResult = mysqli_fetch_assoc($customer);
          $cus_id = $cusResult['id'];
          $cus_email = $cusResult['email'];
          $cus_name = $cusResult['fullname'];

          if($email == $cus_email){
            $db->query("INSERT INTO orders (`cid`,`fullname`,`productinfo`,`total`,`paid`,`invoice`,`ip_add`) VALUES ('$cus_id','$cus_name','$productinfo','$amount',1,'$invoice','$ip')");
          }else{            
            $cus_id = mt_rand();
            $db->query("INSERT INTO orders (`cid`,`fullname`,`productinfo`,`total`,`paid`,`invoice`,`ip_add`) VALUES ('$cus_id','$firstname','$productinfo','$amount',1,'$invoice','$ip')");
          }
                   
          $db->query("INSERT INTO transactions (cart_id,fullname,email,phone,address1,address2,city,state,zipcode,country,total,productinfo,txnid) VALUES ('$cart_id','$firstname','$email','$phone','$address1','$address2','$city','$state','$zipcode','$country','$amount','$productinfo','$txnid')");
		   }
?>

<div class='container-fluid'>
  <h3 class='h3-responsive px-2 py-2'><b>Suggested Items:</b></h3> 

  <?php 
    $sql = 'SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND beauty_regime = 0 ORDER BY RAND() LIMIT 0,4';
    $products = $db->query($sql);
  ?>

  <div class='row'>   
    <?php while($product = mysqli_fetch_assoc($products)): ?>
    <div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>         
      <div class='card card-cascade wider card-ecommerce' style='background-color:'>
        <div class='view zoom view-cascade overlay'>
          <?php $photos = explode(',',$product['image']); ?>
          <img src='<?= $photos[0]; ?>' class='card-img-top img-fluid' alt='<?= $product['title']; ?>'>
          <button onclick='detailsmodal(<?= $product['id']; ?>)' style='background: none;border: none;cursor: pointer'><div class='mask rgba-white-slight'></div></button>
        </div>
        <div class='card-body card-body-cascade text-center'>
              <h5>
                  <strong>
              <button onclick='detailsmodal(<?= $product['id']; ?>)' style='background: none;border: none;cursor: pointer;padding-bottom: 1em'><?=$product['title'];?></button><br>
                      <span class='badge badge-pill my-2' style='background-color: #6b5523'>&#8377; <?=$product['price']; ?></span>
                        &nbsp;&nbsp;&nbsp;
                      <span class='badge badge-pill my-2' style='background-color: #6b5523'><?=$product['weight']; ?></span>
                  </strong>
              </h5>
              <h6 class=''><?=$product['short_desc'];?></h6>
          </div>
          <div class='card-footer px-1 px-3 py-3' style="background-color: #c0a567">
                <span class='float-right'>
                  <button type='button' style='margin: 0;cursor: pointer;border:none;border-radius: 10em;background: #6b5523' class='btn btn-md' title='Add to Product' onclick='detailsmodal(<?= $product['id']; ?>)'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></button>
                </span>
            </div>
      </div>  
      <br>        
    </div>
    <?php endwhile;?> 

  </div>
</div>

<?php
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <sksksharma0@gmail.com>' . "\r\n";  
  $subject = "Your Khadi Premium Cosmetics Order is Successful!";  
  $message = "
  <html> 
    <p>Hello dear <b style='color:#1c2a48;'>$firstname,</b> your order is placed successfully and will be processed shortly. Thank you for your support! Please find below the details on your purchase.
    </p>  
    <table align='center'>  
      <tr align='center'><td colspan='6'><h2>Your Order Details from onlinetuting.com</h2></td></tr>      
      <tr align='center'>
        <th><b>Product Details</b></th>
        <th><b>Total</b></th>
        <th><b>Shipping Address</th></th>
        <th>Invoice No</th>
      </tr>      
      <tr align='center'>
        <td>$nl2br($productinfo)</td>
        <td>$amount</td>
        <td>$nl2br($address1), $nl2br($address2)</td>
        <td>$invoice</td>
      </tr>  
    </table>  
  </html>  
  ";
  
  mail($email,$subject,$message,$headers);
?>

<?php
  include('includes/footer.php');
?>