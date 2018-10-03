<!--Details Modal-->
<?php 

	require_once '../core/init.php';
	$id = $_POST['id'];
	$id = (int)$id;
	$sql = "SELECT * FROM products WHERE id = '$id'";
	$result = $db->query($sql);
	$product = mysqli_fetch_assoc($result); 

?>

<?php ob_start(); ?>

				<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" type="button" onclick="closeModal()" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title text-center"><?= $product['title']; ?></h4>
							</div>
							<div class="modal-body">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-4">
											<div class="">
												<img src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" class="details img-responsive">
											</div>
										</div>
										<div class="col-md-8">
		  									<h5>ITEM CODE: <?= $product['sku']; ?></h5>
		  									<label><?= $product['tagline']; ?></label>
		  									<p><?= $product['short_desc']; ?></p>
		  									<p>&#8377; <?= $product['price']; ?></p>
		  									<form action="add_cart.php" method="post">
		  										<div class="form-group">
		  											<div class="col-md-4 col-sm-6 col-xs-12">
		  												<label for="Weight">Weight: </label>
		  												<?= $product['weight']; ?>
		  											</div>
		  										</div>
		  										<div class="form-group">
		  											<div class="col-md-4 col-sm-6 col-xs-12">
		  												<label for="quantity">Quantity: </label>
		  												<input type="text" name="quantity" class="form-control" id="quantity">

		  											</div>
		  										</div>
		  										<div class="stock">
		  											<div class="col-md-4 col-sm-6 col-xs-12">
			  											<p>Product Availability: <?= $product['stock']; ?></p>
			  										</div>
			  									</div>	  											
		  									</form>
		  									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		  										<p align="justify">
		  											<?= $product['long_desc']; ?>
		  										</p>
		  									</div>
		  									<br>
		  									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<a href="#" class="regime-shop">Write a Review</a>
											</div>
		  								</div>
									</div>
								</div>
							</div>
							<br>
							<div class="modal-footer">
								<button class="btn btn-default" onclick="closeModal()">Close</button>
								<button class="btn btn-warning" type="submit">Add to Cart &nbsp;<span class="glyphicon glyphicon-shopping-cart"></span></button>
							</div>
						</div>
					</div>
				</div>
	<script type="text/javascript">
		function closeModal(){
			jQuery('#details-modal').modal('hide');
			setTimeOut(function(){
				jQuery('#details-modal').remove();
				jQuery('.modal-backdrop').remove();
			},500);
		}
		$('#details-modal').on('hidden.bs.modal', function(){ 
        $('#details-modal').remove();
  }) ;﻿
	</script>

<?php echo ob_get_clean(); ?>