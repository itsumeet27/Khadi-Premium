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

<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  </head>
  <body onload="submitPayuForm()">
  <div class="container">
    <h2 class="text-center">Checkout Form</h2>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 container-fluid">
      <form action="<?php echo $action; ?>" method="post" name="payuForm">
        <?php if($formError) { ?>  
          <span style="color:red" class="text-center text-danger">Please fill all mandatory fields.</span>
          <br/>
        <?php } ?>
        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
        <table class="table table-responsive">
          <caption class="text-center"><h3>Mandatory fields</h3></caption>
          <tr>
            <td>Amount: <span class="text-danger">*</span></td>
            <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          </tr>
          <tr>
            <td>First Name: <span class="text-danger">*</span></td>
            <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
          </tr>
          <tr>
            <td>Email: <span class="text-danger">*</span></td>
            <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          </tr>
          <tr>
            <td>Phone: <span class="text-danger">*</span></td>
            <td><input type="phone" max="10" min="10" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
          </tr>
          <tr>
            <td>Product Info: <span class="text-danger">*</span></td>
            <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
          </tr>
          <tr>
            <td>Success URI: </td>
            <td colspan="3"><input name="surl" type="hidden" value="http://localhost/khadi/payu/response.php" size="64" /></td>
          </tr>
          <tr>
            <td>Failure URI: </td>
            <td colspan="3"><input name="furl" type="hidden" value="http://localhost/khadi/payu/response.php" size="64" /></td>
          </tr>

          <tr>
            <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
          </tr>
        </table>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 container-fluid">  
        <table class="table table-responsive">
          <caption class="text-center"><h3>Optional fields</h3></caption>
          <tr>
            <td>Last Name: </td>
            <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
            <td>Cancel URI: </td>
            <td><input name="curl" value="" /></td>
          </tr>
          <tr>
            <td>Address1: </td>
            <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
            <td>Address2: </td>
            <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
          </tr>
          <tr>
            <td>City: </td>
            <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
            <td>State: </td>
            <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
          </tr>
          <tr>
            <td>Country: </td>
            <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
            <td>Zipcode: </td>
            <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
          </tr>
          <tr>
            <td>UDF1: </td>
            <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
            <td>UDF2: </td>
            <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
          </tr>
          <tr>
            <td>UDF3: </td>
            <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
            <td>UDF4: </td>
            <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
          </tr>
          <tr>
            <td>UDF5: </td>
            <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
            <td>PG: </td>
            <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
          </tr>
          <tr>
            <?php if(!$hash) { ?>
              <td colspan="4"><input type="submit" value="Submit" class="btn btn-default btn-success" /></td>
            <?php } ?>
          </tr>
        </table>
      </form>
    </div>
  </div>
  </body>
</html>