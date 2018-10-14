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
										<span id="modal_errors" class="bg-danger"></span>
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
		  									<form action="add_cart.php" method="post" id="add_product_form">
		  										<input type="hidden" name="product_id" value="<?=$id;?>">
		  										<input type="hidden" name="available" id="available" value=10>
		  										<div class="form-group">
		  											<div class="col-md-4 col-sm-6 col-xs-12">
		  												<label for="Weight">Weight: </label>
		  												<?= $product['weight']; ?>
		  											</div>
		  										</div>
		  										<div class="form-group">
		  											<div class="col-md-4 col-sm-6 col-xs-12">
		  												<label for="quantity">Quantity: </label>
		  												<input type="number" name="quantity" class="form-control" id="quantity" min=0>

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
		  											<?= nl2br($product['long_desc']); ?>
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
								<button class="btn btn-primary" onclick="closeModal()">Close</button>
								<button class="btn btn-warning" onclick="add_to_cart();">Add to Cart &nbsp;<span class="glyphicon glyphicon-shopping-cart"></span></button>
							</div>
						</div>
					</div>
				</div>
	<script type="text/javascript">

		jQuery('#quantity').change(function(){
			var available = jQuery('#quantity').data('');
		});

		function closeModal(){
			jQuery('#details-modal').modal('hide');
			setTimeOut(function(){
				jQuery('#details-modal').remove();
				jQuery('.modal-backdrop').remove();
			},500);
		}

		$('#details-modal').on('hidden.bs.modal', function(){ 
        $('#details-modal').remove();
  		});﻿

		function add_to_cart(){
			jQuery('#modal-errors').html("");
			var quantity = jQuery('#quantity').val();
			var available = jQuery('#available').val();
			var error = '';
			var data = jQuery('#add_product_form').serialize();
			if(quantity == '' || quantity == 0){
				error += '<p class="text-danger text-center">You must choose a quantity</p>';
				jQuery('#modal_errors').html(error);
				return;
			}else if(quantity > 10){
				error += '<p class="text-danger text-center">Sorry, there are only '+available+' avaialable.</p>';
				jQuery('#modal_errors').html(error);
				return;
			}else{
				jQuery.ajax({
					url : '/khadi/admin/parsers/add_cart.php',
					method : 'post',
					data : data,
					success : function(){
						location.reload();
					},
					error : function(){
						alert('Something went wrong');
					}
				});
			}
		}
	</script>

<?php echo ob_get_clean(); ?>