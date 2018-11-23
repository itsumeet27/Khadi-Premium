<?php
	include('includes/header.php');
	include('core/init.php');
?>

<?php
    $name = ((isset($_POST['blog_name']) && $_POST['blog_name'] != '')?sanitize($_POST['blog_name']):'');
    $email = ((isset($_POST['blog_email']) && $_POST['blog_email'] != '')?sanitize($_POST['blog_email']):'');
    $tagline = ((isset($_POST['blog_tagline']) && $_POST['blog_tagline'] != '')?sanitize($_POST['blog_tagline']):'');
    $message = ((isset($_POST['blog_message']) && $_POST['blog_message'] != '')?sanitize($_POST['blog_message']):'');
    $blog = ((isset($_POST['blog']) && $_POST['blog'] != '')?sanitize($_POST['blog']):'');

    $insertBlogSql = "INSERT INTO comments (`name`,`email`,`tagline`,`message`,`blog`) VALUES ('$name','$email','$tagline','$message','$blog')";
      $db->query($insertBlogSql);
?>
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
				<a href=""><h1 class="white-text h1-responsive">Thank You</h1></a>
				</div>
			</div>
		</div>
	</div>
</div>

<h3 class="h3-responsive text-center green-text p-3">Your review has been submitted successfully</h3>

<div class="container-fluid">
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
                      <span class='badge badge-pill my-2' style='background-color: #546e7a'>&#8377; <?=$product['price']; ?></span>
                        &nbsp;&nbsp;&nbsp;
                      <span class='badge badge-pill my-2' style='background-color: #546e7a'><?=$product['weight']; ?></span>
                  </strong>
              </h5>
              <h6 class=''><?=$product['short_desc'];?></h6>
          </div>
          <div class='card-footer px-1 px-3 py-3'>
                <span class='float-right'>
                  <button type='button' style='margin: 0;cursor: pointer;border:none;border-radius: 10em;background: #1c2a48' class='btn btn-md' title='Add to Product' onclick='detailsmodal(<?= $product['id']; ?>)'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></button>
                </span>
            </div>
      </div>  
      <br>        
    </div>
    <?php endwhile;?> 
  </div>
</div>
<?php include('includes/footer.php');?>