<?php include('core/init.php');?>

<!-- Skin Car -->

<?php 		
		
	function getSkinCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 1";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li style='padding: 0.5em;'><a href='skin-care.php?cat=$cat_id'>$cat_title</a></li>";
			
		}
	}

	function getSkinPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND cat_name = 'skin-care' AND beauty_regime = 0";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}

	function getCatSkinPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND cat_name = 'skin-care'";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}
?>

<!-- Hair Care -->

<?php 		
		
	function getHairCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 2";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li style='padding: 0.5em;'><a href='hair-care.php?cat=$cat_id'>$cat_title</a></li>";
			
		}
	}

	function getHairPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND cat_name = 'hair-care' AND beauty_regime = 0";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}

	function getCatHairPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND cat_name = 'hair-care'";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}
?>

<!-- Body Care -->

<?php 		
		
	function getBodyCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 3";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li style='padding: 0.5em;'><a href='body-care.php?cat=$cat_id'>$cat_title</a></li>";
			
		}
	}

	function getBodyPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND cat_name = 'body-care' AND beauty_regime = 0";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}

	function getCatBodyPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND cat_name = 'body-care'";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}
?>

<!-- Bath & Beauty -->

<?php 		
		
	function getBath_BeautyCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 4";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li style='padding: 0.5em;'><a href='bath-and-beauty.php?cat=$cat_id'>$cat_title</a></li>";
			
		}
	}

	function getBath_BeautyPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND cat_name = 'bath-and-beauty' AND beauty_regime = 0";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}

	function getCatBath_BeautyPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND cat_name = 'bath-and-beauty'";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}
?>

<!-- Skin Car -->

<?php 		
		
	function getBeautyCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 20";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li style='padding: 0.5em;'><a href='beauty-regime.php?cat=$cat_id'>$cat_title</a></li>";
			
		}
	}

	function getBeautyPro(){
		if (!isset($_GET['cat'])) {

			global $db;

			$get_pro = "SELECT * FROM products WHERE featured = 0 AND deleted = 0 AND beauty_regime = 1";
			$run_pro = mysqli_query($db, $get_pro);

			while ($row_pro = mysqli_fetch_array($run_pro)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"	
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}

	function getCatBeautyPro(){
		if (isset($_GET['cat'])) {

			$cat_id = $_GET['cat'];

			global $db;

			$get_cat_pro = "SELECT * FROM products WHERE categories = '$cat_id' AND featured = 0 AND deleted = 0 AND beauty_regime = 1";
			$run_cat_pro = mysqli_query($db, $get_cat_pro);

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
					$pro_id = $row_cat_pro['id'];
					$pro_cat = $row_cat_pro['categories'];
					$pro_image = $row_cat_pro['image'];
					$pro_title = $row_cat_pro['title'];
					$pro_weight = $row_cat_pro['weight'];
					$pro_price = $row_cat_pro['price'];

					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center'>
							<div class='products'>
								<div class='product-img'>
									<img src='$photos[0]' class='img-responsive' alt='$pro_title'>
								</div>
								<div class='product-desc'>
									<div class='prod-head'>
										<h4>$pro_title</h4>
									</div>
									<div class='prod-desc'>
										<p>$pro_weight <br> &#8377; $pro_price</p>
									</div>
								</div>
								<div class='add-to-cart'>
									<button type='button' class='btn btn-sm btn-success' onclick='detailsmodal($pro_id)'>Shop Now</button>
								</div>
							</div>
						</div>			
					";
			}
		}
	}
?>