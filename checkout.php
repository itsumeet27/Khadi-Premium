<?php
  include 'includes/header.php';
  require_once 'core/init.php';
  if($cart_id != ''){
    $cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
    $result = mysqli_fetch_assoc($cartQ);
    $items = json_decode($result['items'],true);
    $i = 1;
    $sub_total = 0;
    $item_count = 0;
  }
?>

<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "ZVTYAcil";
// Merchant Salt as provided by Payu
$SALT = "U5A5zpZYXd";
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://sandboxsecure.payu.in";
$action = '';
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  
  }
}
$formError = 0;
if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
      || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  <body onload="submitPayuForm()">
  <div id="about" class="view" style="height: 50%;background: url('img/2054.jpg')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
    <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
      <div class="row d-flex justify-content-center text-center">
        <div class="">
          <!-- Heading -->
          <a href=""><h1 class="white-text h1-responsive">Checkout Now</h1></a>
        </div>
      </div>
        </div>
    </div>
  </div>
  <div class="container-fluid">
    <h2 class="text-center h2-responsive px-3 py-3"><b>Checkout Form</b></h2>
        <?php if($formError) { ?>  
          <span style="color:red" class="text-center text-danger">Please fill all mandatory fields.</span>          
          <br/>
        <?php } ?>
        <div>
          <h6 class="h6-responsive" style="color: #1c2a48;line-height: 1.6em;"><b>Important Note: </b>Do not edit or change the amount and the product description for successful payment processing. Please select products in cart and then proceed for successful checkout</h6>
        </div>
          <form action="<?php echo $action; ?>" method="post" name="payuForm">        
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
          <div class="row">
            <div class="col-md-6">
              <div class="md-form">
              <?php
                foreach($items as $item){
                  $product_id = $item['id'];
                  $productQ = $db->query("SELECT * FROM products WHERE id = '{$product_id}'");
                  $product = mysqli_fetch_assoc($productQ);               
                ?>
                <?php 
                    $i++;
                    $item_count += $item['quantity'];
                    $sub_total += ($product['price'] * $item['quantity']);
                  
                  /*$tax = TAXRATE * $sub_total;
                  $tax = number_format($tax,2);*/
                  $grand_total = $sub_total;
                ?>
              <?php } ?>
                <input type="text" id="inputIconEx1" class="form-control" name="amount" value="<?=intval($grand_total);?>"  style="border-color: #1c2a48"/>
                <label for="inputIconEx1">Amount<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <input type="text" id="inputIconEx2" class="form-control" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>"  style="border-color: #1c2a48"/>
                <label for="inputIconEx2">Full Name<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form" style="display: none">
                <input type="text" id="inputIconEx3" class="form-control" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>"  style="border-color: #1c2a48"/>
                <label for="inputIconEx3">Last Name<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <input type="email" id="inputIconEx10" class="form-control" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>"  style="border-color: #1c2a48"/>
                <label for="inputIconEx10">Email<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <input type="text" id="inputIconEx11" class="form-control" max="10" min="10" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"  style="border-color: #1c2a48"/>
                <label for="inputIconEx11">Phone<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <textarea id="textarea-char-counter" class="form-control md-textarea" name="productinfo" cols="40"  style="border-color: #1c2a48"><?php foreach($items as $item){ $product_id = $item['id']; $productQ = $db->query("SELECT * FROM products WHERE id = '{$product_id}'"); $product = mysqli_fetch_assoc($productQ); ?><?php $i++; $item_count += $item['quantity']; $sub_total += ($product['price'] * $item['quantity']); $grand_total = $sub_total; ?><?=$product['title'];?> (x<?=$item['quantity'];?>) <?php } ?></textarea>
                <label for="textarea-char-counter">Product Info<span class="text-danger"> *</span></label>
              </div>              
              <div class="md-form" style="display: none;">
                <input name="surl" type="hidden" value="http://localhost/khadi/success.php" size="64" />
              </div>
              <div class="md-form" style="display: none;">
                <input name="furl" type="hidden" value="http://localhost/khadi/failure.php" size="64" />
              </div>
              <div class="md-form" style="display: none;">
                <input name="curl" value="http://localhost/khadi/products.php" />
              </div>
              <div class="md-form" style="display: none;">
                <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
              </div>
              <div class="md-form" style="display: none;">
                <input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="md-form">
                <input type="text" id="inputIconEx4" class="form-control" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" style="border-color: #1c2a48"/>
                <label for="inputIconEx4">Address1<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <input type="text" id="inputIconEx5" class="form-control" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" style="border-color: #1c2a48"/>
                <label for="inputIconEx5">Address2<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <input type="text" id="inputIconEx6" class="form-control" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" style="border-color: #1c2a48"/>
                <label for="inputIconEx6">City<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <input type="text" id="inputIconEx7" class="form-control" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" style="border-color: #1c2a48"/>
                <label for="inputIconEx7">State<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <input type="text" id="inputIconEx8" class="form-control" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" style="border-color: #1c2a48"/>
                <label for="inputIconEx8">Zipcode<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form">
                <input type="text" id="inputIconEx9" class="form-control" name="country" value="India" style="border-color: #1c2a48"/>
                <label for="inputIconEx9">Country<span class="text-danger"> *</span></label>
              </div>
              <div class="md-form" style="display: none;">
                <input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
              </div>
              <div class="md-form" style="display: none;">
                <input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
              </div>
              <div class="md-form" style="display: none;">
                <input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />
              </div>
              <div class="md-form" style="display: none;">
                <input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
              </div>
              <div class="md-form" style="display: none;">
                <input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" />
              </div>
            </div>
          </div>
          <div>
            <?php if(!$hash) { ?>
              <button type="submit" class="btn" style="background: #1c2a48;border-radius: 10em">Submit</button>
            <?php } ?>
          </div>
        </form>
      </div>
    <?php include 'includes/footer.php';?>
