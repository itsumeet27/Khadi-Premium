<?php 

	include('includes/header.php');
	include('core/init.php');

?>

<?php 
	$sql = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND beauty_regime = 0";
	$products = $db->query($sql);
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
              <a href=""><h1 class="white-text h1-responsive">All Products</h1></a>
              <button type="button" class="btn btn-outline-white">Browse Now<i class="fa fa-shopping-cart ml-2"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
	<!--Products Display-->
	<div class="container-fluid">
		<h2 class="text-center h2-responsive px-2 py-3"><b>Products by Khadi Premium Cosmetics</b></h2>
		<section class="text-center my-5">
			<div class="row">		
				<?php while($product = mysqli_fetch_assoc($products)): ?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4">					
					<div class="card card-cascade wider card-ecommerce" style="background-color:">
						<div class="view zoom view-cascade overlay">
							<?php $photos = explode(',',$product['image']); ?>
							<img src="<?= $photos[0]; ?>" class="card-img-top img-fluid" alt="<?= $product['title']; ?>">
							<button onclick="detailsmodal(<?= $product['id']; ?>)" style="background: none;border: none;cursor: pointer"><div class="mask rgba-white-slight"></div></button>
						</div>
						<div class="card-body card-body-cascade text-center">
					        <h5>
					            <strong>
									<button onclick="detailsmodal(<?= $product['id']; ?>)" style="background: none;border: none;cursor: pointer;padding-bottom: 1em"><b><?=$product['title'];?></b></button><br>
					                <span class="badge badge-pill my-2 z-depth-0" style="background-color: #546e7a">&#8377; <?=$product['price']; ?></span>
					                	&nbsp;&nbsp;&nbsp;
					                <span class="badge badge-pill my-2 z-depth-0" style="background-color: #546e7a"><?=$product['weight']; ?></span>
					            </strong>
					        </h5>
					        <h6 class=""><?=$product['short_desc'];?></h6>
					    </div>
					    <div class="card-footer px-1 px-3 py-3">
					    	<span class='float-left'>
					    		<button onclick='detailsmodal(<?= $product['id']; ?>)' style='margin: 0;cursor: pointer;border:none;background: #1c2a48;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
					    	</span>
				            <span class='float-right'>
				            	<a href='description.php?pro_id=<?= $product['id']; ?>' style='margin: 0;cursor: pointer;border:none;background: #1c2a48;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
				            	<!-- <button type="button" style="margin: 0;cursor: pointer;border:none;border-radius: 10em;background: #1c2a48" class="btn btn-md" title="Add to Product" onclick="detailsmodal(<?= $product['id']; ?>)">Add to Cart &nbsp;<i class="fa fa-cart-plus"></i></button> -->
				            </span>
				        </div>
					</div>	
					<br>				
				</div>
				<?php endwhile;?>	

			</div>
		</section>
	</div>

<?php include('includes/footer.php');?>