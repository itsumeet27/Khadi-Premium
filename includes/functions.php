<?php include('core/init.php');?>

<!-- Blogs -->

<?php 
	function getBlog(){
		global $db;
		$get_blog = "SELECT * FROM blog WHERE deleted = 0";
		$run_blog = mysqli_query($db, $get_blog);
		while ($row_blog = mysqli_fetch_array($run_blog)) {
			$blog_id = $row_blog['id'];
			$blog_title = $row_blog['title'];
			echo "<li style='padding: 0.5em;'><a href='posts.php?blog_id=$blog_id'>$blog_title</a></li>";
			
		}
	}
?>

<!-- Skin Car -->

<?php 		
		
	function getSkinCare(){
		global $db;

		$get_cats = "SELECT * FROM categories WHERE parent = 1";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$cat_id = $row_cats['id'];
			$cat_title = $row_cats['category'];

			echo "<li><a href='skin-care.php?cat=$cat_id' style='padding: 7.5px;'>$cat_title</a></li>";
			
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
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
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
					$pro_short_desc = $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
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
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
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
					$pro_short_desc = $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
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
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
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
					$pro_short_desc = $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
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
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
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
					$pro_short_desc = $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
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
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"	
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
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
					$pro_short_desc	= $row_cat_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
						<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<a>
					              		<div class='mask rgba-white-slight'></div>
					              	</a>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
              						<a href='' class='grey-text'></a>
                  					<h5>
					                    <strong>
					                        <a href='' class='dark-grey-text'>$pro_title
					                        <br>
					                            <span class='badge badge-pill primary-color my-2'>$pro_weight
					                            </span>
					                        </a>
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left font-weight-bold'>
				                        <strong> &#8377; $pro_price</strong>
				                    </span>
				                    <span class='float-right'>
				                      <button type='button' style='background: #ffa0;margin: 0;cursor: pointer;border:none;' class='' title='View Product' onclick='detailsmodal($pro_id)'><i class='fa fa-eye ml-3' style='color: #000;font-size: 1.3rem'></i></button>
				                        <a class='' data-toggle='tooltip' data-placement='top' title='Add to Cart'>
				                          <i class='fa fa-shopping-bag ml-3' style='color: #000;font-size: 1.3rem'></i>
				                        </a>
				                    </span>
                				</div>
          					</div>  
         					<br>        
						</div>					
					";
			}
		}
	}
?>