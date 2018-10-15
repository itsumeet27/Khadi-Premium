<?php 

	include('includes/header.php');

?>

<?php 
	$sql = "SELECT * FROM products WHERE featured = 0 AND deleted=0";
	$products = $db->query($sql);
?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	      <li data-target="#myCarousel" data-slide-to="3"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	      	<div class="item active">
	        	<img src="images/_MG_8998.jpg" alt="Skin Care" style="width:100%;">
	      	</div>
			<div class="item">
	        	<img src="images/_MG_9019.jpg" alt="Skin Care" style="width:100%;">
	      	</div>
			<div class="item">
	        	<img src="images/_MG_9025 2.jpg" alt="Skin Care" style="width:100%;">
	      	</div>
	      	<div class="item">
	        	<img src="images/IMG_1737.jpg" alt="Skin Care" style="width:100%;">
	      	</div>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      	<span class="glyphicon glyphicon-chevron-left"></span>
	      	<span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      	<span class="glyphicon glyphicon-chevron-right"></span>
	      	<span class="sr-only">Next</span>
	    </a>
	</div>

	<!--Products Display-->

	<div class="container-fluid">
		<div class="col-md-2">
			<h4>Left Sidebar</h4>
		</div>
		
		<div class="col-md-7">
			<div class="row">
				<?php while($product = mysqli_fetch_assoc($products)): ?>
				<div class="col-md-4 text-center">
					<div class="products">
						<div class="product-img">
							<?php $photos = explode(',',$product['image']); ?>
							<img src="<?= $photos[0]; ?>" class="img-responsive" alt="<?= $product['title']; ?>">
						</div>
						<div class="product-desc">
							<div class="prod-head">
								<h4><?= $product['title']; ?></h4>
							</div>
							<div class="prod-desc">
								<p><?= $product['weight']; ?> <br> &#8377; <?= $product['price']; ?></p>
							</div>
						</div>
						<div class="add-to-cart">
							<button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?= $product['id']; ?>)">Shop Now</button>
						</div>
					</div>
				</div>
				<?php endwhile;?>
			</div>
		</div>				
		<div class="col-md-3">
			<?php include 'includes/rightbar.php';?>
		</div>			
	</div>
	<script type="text/javascript">
		function detailsmodal(id){
			var data = {"id" : id};
			jQuery.ajax({
				url : '/khadi/includes/modal.php',
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

