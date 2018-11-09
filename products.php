<?php 

	include('includes/header.php');
	include('core/init.php');

?>

<?php 
	$sql = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND beauty_regime = 0";
	$products = $db->query($sql);
?>
	
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100 img-fluid" src="images/ban1.jpg" alt="First slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Light mask</h3>
        <p>First text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100 img-fluid" src="images/ban2.jpg" alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Strong mask</h3>
        <p>Secondary text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100 img-fluid" src="images/ban3.jpg" alt="Third slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Slight mask</h3>
        <p>Third text</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

	<!--Products Display-->
	<div class="container-fluid">
		<h2 class="text-center h2-responsive px-2 py-3"><b>Products by Khadi Premium Cosmetics</b></h2>
		<section class="text-center my-5">
			<div class="row">		
				<?php while($product = mysqli_fetch_assoc($products)): ?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4">					
					<div class="card card-cascade wider card-ecommerce">
						<div class="view zoom view-cascade overlay">
							<?php $photos = explode(',',$product['image']); ?>
							<img src="<?= $photos[0]; ?>" class="card-img-top img-fluid" alt="<?= $product['title']; ?>">
							<a><div class="mask rgba-white-slight"></div></a>
						</div>
						<div class="card-body card-body-cascade text-center">
					        <h5>
					            <strong>
						            <a href="" class="dark-grey-text"><?=$product['title'];?><br>
						                <span class="badge badge-pill primary-color my-2"><?=$product['weight']; ?></span>
						            </a>
					            </strong>
					        </h5>
					        <h6 class=""><?=$product['short_desc'];?></h6>
					    </div>
					    <div class="card-footer px-1 px-3 py-3">
				            <span class="float-left font-weight-bold">
				              	<strong> &#8377; <?=$product['price']; ?></strong>
				            </span>
				            <span class="float-right">
				            	<button type="button" style="background: #ffa0;margin: 0;cursor: pointer;border:none;" class="" title="View Product" onclick="detailsmodal(<?= $product['id']; ?>)"><i class="fa fa-eye ml-3" style="color: #000;font-size: 1.3rem"></i></button>
				              	<!-- <a class="" data-toggle="tooltip" data-placement="top" title="View Product">
				                	<i class="fa fa-eye grey-text ml-3"></i>
				              	</a> -->
				              	<a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
				                	<i class="fa fa-shopping-bag ml-3" style="color: #000;font-size: 1.3rem"></i>
				              	</a>
				            </span>
				        </div>
					</div>	
					<br>				
				</div>
				<?php endwhile;?>	

			</div>
		</section>
	</div>
	<script type="text/javascript">
		function detailsmodal(id){
			var data = {"id" : id};
			jQuery.ajax({
				url : 'includes/modal.php',
				method : "post",
				data : data,
				success: function(data){
					jQuery('body').append(data);
					jQuery('#details-modal').modal('toggle');
				},
				error: function(){
					alert("Something went wrong!");
				}
	 		})
		}
	</script>

<?php include('includes/footer.php');?>