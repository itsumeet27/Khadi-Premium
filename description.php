<!--Details Modal-->
<?php 
	include('includes/header.php');
	include('core/init.php');
	include('includes/functions.php');

if(isset($_GET['pro_id'])){
		$id = sanitize((int)$_GET['pro_id']);
		$sql = "SELECT * FROM products WHERE id = '$id'";
		$result = $db->query($sql);
		$proCount = mysqli_num_rows($result);
		if($proCount > 0){
			while ($row = mysqli_fetch_array($result)) {
				$id = $row['id'];
				$title = $row['title'];
				$image = $row['image'];
				$sku = $row['sku'];
				$tagline = $row['tagline'];
				$short_desc = $row['short_desc'];
				$long_desc = $row['long_desc'];
				$price = $row['price'];
				$weight = $row['weight'];
				$stock = $row['stock'];
				
			}
		}else{
			echo "Blog does not exist";
			exit();
		}
	}
	else{
		echo "Data is missing";
		exit();
	}

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
				<a href=""><h1 class="white-text h1-responsive">Product Description</h1></a>
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="card p-3">
		<div class="">
			<div class="card-content">
				<div class="card-header" style="background: #3b465e;color: #fff;">								
					<h4 class="card-title text-center"><?php echo $title;?></h4>
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<span id="modal_errors"></span>
						<div class="row">
							<div class="col-md-6 fotorama">
								<?php $photos = explode(',',$image);
								foreach($photos as $photo):
									?>
									<img src="<?=$photo; ?>" alt="<?php echo $title; ?>" class="details img-fluid">
								<?php endforeach; ?>
							</div>
							<div class="col-md-6">
								<h5><b>ITEM CODE:</b> <?php echo $sku; ?></h5>
								<label><?php echo $tagline; ?></label>
								<p><?php echo $short_desc; ?></p>
								<form action="add_cart.php" method="post" id="add_product_form">
									<input type="hidden" name="product_id" value="<?php echo $id;?>">
									<input type="hidden" name="available" id="available" value=10>
									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label><b>Price:</b> &#8377; <?php echo $price; ?></label>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label for="Weight"><b>Weight:</b> </label>
											<?php echo $weight; ?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label for="quantity"><b>Quantity:</b> </label>
											<input type="number" name="quantity" class="form-control" id="quantity" min=1 value="1">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<p><b>Product Availability:</b> <?php echo $stock; ?></p>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<h5 class="h5-responsive py-3"><b>Description:</b></h5>
											<p align="justify">
												<?php echo nl2br($long_desc); ?>
											</p>
										</div>
									</div>	  											
								</form>
								
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								
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
							              <input type="text" id="form10" class="form-control form-control-sm" name="product" value="<?php echo $title;?>">
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
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="card-footer blue-grey">					
					<button class="btn btn-white" style="border-radius: 10em;" onclick="add_to_cart();">Add to Cart &nbsp;<span class="fa fa-shopping-cart"></span></button>
				</div>
			</div>
		</div>
	</div>

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

<?php include('includes/footer.php');?>