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
<html>
<head>
	<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
</head>
<body>

	<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header" style="background: #3b465e;color: #fff;">								
					<h4 class="modal-title text-center"><?= $product['title']; ?></h4>
					<button class="close" type="button" onclick="closeModal()" aria-label="Close" style="color: #fff">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<span id="modal_errors"></span>
						<div class="row">
							<div class="col-md-6 fotorama">
								<?php $photos = explode(',',$product['image']);
								foreach($photos as $photo):
									?>
									<img src="<?=$photo; ?>" alt="<?= $product['title']; ?>" class="details img-responsive">
								<?php endforeach; ?>
							</div>
							<div class="col-md-6">
								<h5><b>ITEM CODE:</b> <?= $product['sku']; ?></h5>
								<label><?= $product['tagline']; ?></label>
								<p><?= $product['short_desc']; ?></p>
								<form action="add_cart.php" method="post" id="add_product_form">
									<input type="hidden" name="product_id" value="<?=$id;?>">
									<input type="hidden" name="available" id="available" value=10>
									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label><b>Price:</b> &#8377; <?= $product['price']; ?></label>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label for="Weight"><b>Weight:</b> </label>
											<?= $product['weight']; ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label for="quantity"><b>Quantity:</b> </label>
											<input type="number" name="quantity" class="form-control" id="quantity" min=1 value="1">
										</div>
									</div>
									<div class="stock">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<p><b>Product Availability:</b> <?= $product['stock']; ?></p>
										</div>
									</div>	  											
								</form>								
							</div>
							<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h5 class="h5-responsive py-3"><b>Description:</b></h5>
								<p align="justify">
									<?= nl2br($product['long_desc']); ?>
								</p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<a href="#" class="btn" id="review-form" style="background-color: #607d8b">Write a Review</a>
							</div>
							<div class="col-md-12 container" id="review" style="display: none;">
								<div class="card">
									<form class="p-5 grey-text" method="post" action="review.php">
							            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
							              <input type="text" id="form6" class="form-control form-control-sm" name="name">
							              <label for="form3">Your name</label>
							            </div>
							            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
							              <input type="text" id="form7" class="form-control form-control-sm" name="email">
							              <label for="form2">Your email</label>
							            </div>
							            <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
							              <input type="text" id="form10" class="form-control form-control-sm" name="product" value="<?=$product['title'];?>">
							              <label for="form34">Your product</label>
							            </div>
							            <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
							              <textarea type="text" id="form9" class="md-textarea form-control form-control-sm" rows="4" name="message"></textarea>
							              <label for="form8">Your review</label>
							            </div>
							            <div class="text-center mt-4">
							              <button class="btn" type="submit" name="submit" style="background: #607d8b">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
							            </div>
							        </form>
								</div>								
							</div> -->
						</div>
					</div>
				</div>
				<br>
				<div class="modal-footer blue-grey">
					<a href="description.php?pro_id=<?= $product['id']; ?>" class="btn btn-white" style="border-radius: 10em;" title="View Product">View Product</a>
					<button class="btn btn-white" style="border-radius: 10em;" title="Add to Cart" onclick="add_to_cart();">Add to Cart &nbsp;<span class="fa fa-shopping-cart"></span></button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#review-form").click(function(){
	        $("#review").slideToggle("slow");
	    });
	});
</script>
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
					alert('Product has been succesfully added in your cart');
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