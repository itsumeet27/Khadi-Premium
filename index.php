<?php 
	include('includes/header.php');
	require_once 'core/init.php';
	$sql = "SELECT * FROM products WHERE featured = 1";
	$featured = $db->query($sql);
?>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	      	<div class="item active">
	        	<img src="images/ban1.jpg" alt="Los Angeles" style="width:100%;">
	      	</div>
			<div class="item">
	        	<img src="images/ban2.jpg" alt="Chicago" style="width:100%;">
	      	</div>
			<div class="item">
	        	<img src="images/ban3.jpg" alt="Chicago" style="width:100%;">
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
	<div class="container">
	  	<p class="title">
	  		If Good Skin is Treasure, Nature is the Key!
	  	</p>
	  	<p class="title-text">
	  		India's greatest potential lies in the age-old medicinal and transformational herbs that spring off the deeply rich earth of this country. Some with properties so effective, they're seen in scriptures as almost mystical or magical. By complimenting the magic of Indian ingredients with exotic essential oils, we at Khadi Premium proud ourselves for creating the perfect mix of products for your Hair, Skin and Body.
	  	</p>
	  	<p class="title">
	  		So go ahead, Discover these Treasures for Yourself!
	  	</p>

	  	<!--Beauty Regime-->

	  	<div class="regime">
	  		<h2>Beauty Regime</h2>
	  	</div>
	  	<div class="row">
	  		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	  			<center>	
	  				<a href="beauty-regime.php?cat=21"><img src="images/6169.jpg" class="img-responsive"></a>
	  				<a href="beauty-regime.php?cat=21"><h4 class="beauty-regime">
	  					Natural Protection From Sun And Pollution Regime By Khadi Premium
	  				</h4></a>
	  				<a href="beauty-regime.php?cat=21" class="regime-shop">Shop Now</a>
	  			</center>
	  		</div>
	  		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	  			<center>	
	  				<a href="beauty-regime.php?cat=22"><img src="images/2054.jpg" class="img-responsive"></a>
	  				<a href="beauty-regime.php?cat=22"><h4 class="beauty-regime">
	  					Natural Advanced Night Repair Regime By Khadi Premium
	  				</h4></a>
	  				<a href="beauty-regime.php?cat=22" class="regime-shop">Shop Now</a>
	  			</center>
	  		</div>
	  		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	  			<center>	
	  				<a href="beauty-regime.php?cat=23"><img src="images/5511.jpg" class="img-responsive"></a>
	  				<a href="beauty-regime.php?cat=23"><h4 class="beauty-regime">
	  					Natural Nourishment For Hair And Body Regime By Khadi Premium
	  				</h4></a>
	  				<a href="beauty-regime.php?cat=23" class="regime-shop">Shop Now</a>
	  			</center>
	  		</div>
	  	</div>

	  	<!--Featured Products-->

	  	<div class="featured">
	  		<h2>Featured Products</h2>
	  	</div>
	  	<div class="row">
	  		<?php while($product = mysqli_fetch_assoc($featured)) : ?>
	  		<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
	  			<center>
					<div class="featured">
						<div class="product-img">
							<?php $photos = explode(',',$product['image']); ?>
							<img src='<?= $photos[0]; ?>' class="img-responsive" alt="<?= $product['title']; ?>">
						</div>
						<div class="product-desc">
							<div class="prod-head">
								<h4><?= $product['title']; ?></h4>
							</div>
							<div class="prod-desc">
								<p>15 gms <br> &#8377; <?= $product['price']; ?></p>
							</div>
						</div>
						<div class="add-to-cart">
							<button type="button" class="btn btn-sm btn-success" onclick="detailsmodal(<?= $product['id']; ?>)">Shop Now</button>
						</div>
					</div>
				</center>
			</div>			
			<?php endwhile;?>
		</div>
	  	<!--Knowledge-->
	  	
	  	<div class="knowledge">
	  		<h2>Knowledge</h2>
	  	</div>
	  	<div class="row">
	  		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	  			<center>
	  				<h3 class="know-title">Ingredients</h3><hr class="know">	
		  			<div class="row">
		  				<div class="col-md-4">
		  					<img class="img-responsive" src="images/saffron_1_1.jpg">
		  				</div>
		  				<div class="col-md-8">
		  					<h4 class="know-head">Saffron</h4>
		  					<p class="know-desc">
			  					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			  					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			  					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			  					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			  					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			  					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			  				</p>
			  				<div class="know-more">
			  					<a href="#">Read more</a>
			  				</div>
		  				</div>
		  			</div>
	  				
	  			</center>
	  		</div>
	  		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	  			<center>
	  				<h3 class="know-title">Blog</h3><hr class="know">	
		  			<div class="row">
		  				<div class="col-md-4">
		  					<img class="img-responsive" src="images/ylang-ylang.png">
		  				</div>
		  				<div class="col-md-8">
		  					<h4 class="know-head">Ylang Ylang or Aloe Vera?</h4>
		  					<p class="know-desc">
			  					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			  					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			  					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			  					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			  					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			  					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			  				</p>
			  				<div class="know-more">
			  					<a href="#">Read more</a>
			  				</div>
		  				</div>
		  			</div>
	  			</center>
	  		</div>
	  	</div>

	  	<!--Testimonials-->
	<div class="row">
	  	<div class="testimonials">
	  		<h2>Testimonials</h2>
	  	</div>
	  	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		      	<div class="item active">
		        	<h3 class="testimonials-head">Venu Joshi</h3>
		        	<p class="testimonials-text">
		        		I have used a their face product solutions, namely the face wash, scrub and mask. What I really like about their products is that they are made of natural ingredients. They are really mild on the skin, which makes it super soft and supple post usage and makes me feel good. Been using them regularly and have seen positive results on my skin. Blemishes have faded with the help of the mask I am using. I am in love with their products and totally recommend using Khadi Premium.
		        	</p>
		      	</div>
				<div class="item">
		        	<h3 class="testimonials-head">Megha Anand</h3>
		        	<p class="testimonials-text">
		        		I love the regular Khadi products as well, but there is a definite premium feel and quality to the Khadi Premium range which I think is ideal for consumers. The chocolate face mask and soaps so far are my favourite, I love the body wash & body lotion too, it's definitely top notch quality for skin care and price point wise is perfect. The Khadi premium shampoo range is definitely a class above than the regular ones, regular shampoos would leave a dry sensation in my hair but the premium range does not.
		        	</p>
		      	</div>
				<div class="item">
		        	<h3 class="testimonials-head">Megha Arora</h3>
		        	<p class="testimonials-text">
		        		The environment friendly Khadi Premium product range is a traditional breath of fresh air in a highly competitive cosmetic market. A unique combination of natural exotic ingredients and essential oils, this is just the kind of products I was looking for to enhance my wellness regimen. I love their chocolate face mask, which makes my skin radiate with energy and gives me a fresh look. After using the mask and before stepping out I make sure to us their face mist as well for an even better result. 
		        	</p>
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
	</div>
</div>

<?php include('includes/footer.php');?>