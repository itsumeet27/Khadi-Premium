<?php include('includes/header.php');?>

<?php 
	$sql = "SELECT * FROM products WHERE featured = 0";
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

	<div class="container">

		<!-- Skin Care -->
		<div class="row">
			<center>
				<!-- Products of 15 gms-->
				<?php while($product = mysqli_fetch_assoc($products)) : ?>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="<?= $product['image']; ?>" class="img-responsive">
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
					</a>
				</div>
			</center>
			<?php endwhile;?>
			<!--
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Anti-Aging-Argan-Cream.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Anti Aging Argan Cream</h4>
								</div>
								<div class="prod-desc">
									<p>15 gms <br> &#8377; 505</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Argan-Lip-Balm.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Argan Lip Balm</h4>
								</div>
								<div class="prod-desc">
									<p>15 gms <br> &#8377; 465</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Meadowfoam-Lip-Srcub.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Meadowfoam Lip Scrub</h4>
								</div>
								<div class="prod-desc">
									<p>15 gms <br> &#8377; 465</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>

				<!-- Products of 50 gms--
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Rejuvenating-Chamomile-Night-Cream.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Rejuvenating Chamomile Night Cream</h4>
								</div>
								<div class="prod-desc">
									<p>50 gms <br> &#8377; 755</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Ylang-Ylang-Day-Cream.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Ylang Ylang Day Cream</h4>
								</div>
								<div class="prod-desc">
									<p>50 gms <br> &#8377; 575</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Hydrating-Fenugreek-Gel.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Hydrating Fenugreek Gel</h4>
								</div>
								<div class="prod-desc">
									<p>50 gms <br> &#8377; 525</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Exfoliating-Sage-Face-Scrub.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Exfoliating Sage Face Scrub</h4>
								</div>
								<div class="prod-desc">
									<p>50 gms <br> &#8377; 735</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Anti-Acne-Patchouli-Face-Pack.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Anti Acne Patchouli Face Pack</h4>
								</div>
								<div class="prod-desc">
									<p>50 gms <br> &#8377; 505</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Therapeutic-Aloe-Vera-Gel.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Therapeutic Aloe Vera Gel</h4>
								</div>
								<div class="prod-desc">
									<p>50 gms <br> &#8377; 525</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>

				<!-- Products of 60 ml --
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Anti-Pollution-Lime-Face-Mist.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Anti Pollution Lime Face Mist</h4>
								</div>
								<div class="prod-desc">
									<p>60 ml <br> &#8377; 505</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Anti-Bacterial-Neem-Face-Wash.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Anti Bacterial Neem Face Wash</h4>
								</div>
								<div class="prod-desc">
									<p>60 ml <br> &#8377; 625</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Regenerating-Patchouli-Face-Wash.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Regenerating Patchouli Face Wash</h4>
								</div>
								<div class="prod-desc">
									<p>60 ml <br> &#8377; 625</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Refreshing-Neroli-Face-Mist.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Refreshing Neroli Face Mist</h4>
								</div>
								<div class="prod-desc">
									<p>60 ml <br> &#8377; 505</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
			</center>
		</div>

		<!-- Hair Care --
		<div class="row">
			<center>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Deep-Nourishing-Argan-Conditioner.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Deep Nourishing Argan Conditioner</h4>
								</div>
								<div class="prod-desc">
									<p>100 ml <br> &#8377; 565</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Deep-Nourishing-Argan-Shampoo.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Deep Nourishing Argan Shampoo</h4>
								</div>
								<div class="prod-desc">
									<p>200 ml <br> &#8377; 965</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Hairfall-Control-Neroli-Shampoo.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Hairfall Control Neroli Shampoo</h4>
								</div>
								<div class="prod-desc">
									<p>200 ml <br> &#8377; 965</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
			</center>
		</div>

		<!-- Body Care --
		<div class="row">
			<center>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Body-Softening-Cedarwood-Moisturiser.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Body Softening Cedarwood Moisturiser</h4>
								</div>
								<div class="prod-desc">
									<p>100 ml <br> &#8377; 565</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
			</center>
		</div>

		<!-- Bath and Beauty --
		<div class="row">
			<center>

				<!-- Glycerine Bar --
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Antibacterial-Neem-&-Tulsi-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Anti Bacterial Neem & Tulsi Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 205</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Antiseptic-Lemon-&-Tulsi-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Antiseptic Lemon & Tulsi Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 205</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Rejuvenating-Ylang-Ylang-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Rejuvenating Ylang Ylang Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 205</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Reviving-Mint-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Reviving Mint Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 205</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Refreshing-Lime-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Refreshing Lime Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 205</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Aromatic-Rose-Water-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Aromatic Rose Water Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 205</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Moisturising-Aloe-Vera-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Moisturising Aloe Vera Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 205</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>

				<!-- Vegetable Bar --
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Oatmeal-&-Honey-Vegetable-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Oatmeal & Honey Vegetable Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 365</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Regenerating-Apricot-Vegetable-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Regenerating Apricot Vegetable Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 365</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>

				<!-- Scrub Bar --
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Exfoliating-Oatmeal-Honey-Scrub-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Exfoliating Oatmeal & Honey Scrub Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 365</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Exfoliating-Neem-&-Tulsi-Scrub-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Exfoliating Neem & Tulsi Scrub Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 365</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Exfoliating-Almond-Scrub-Bar.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Exfoliating Almond Scrub Bar</h4>
								</div>
								<div class="prod-desc">
									<p>100 gms <br> &#8377; 365</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				&nbsp;
				<!-- Body Wash --
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Regenerating-Patchouli-Body-Wash.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Regenerating Patchouli Body Wash</h4>
								</div>
								<div class="prod-desc">
									<p>200 ml <br> &#8377; 565</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<a href=# class="prod">
						<div class="products">
							<div class="product-img">
								<img src="images/products/Stress-Relieving-Pimentoberry-Body-Wash.jpg" class="img-responsive">
							</div>
							<div class="product-desc">
								<div class="prod-head">
									<h4>Stress Relieving Pimentoberry Body Wash</h4>
								</div>
								<div class="prod-desc">
									<p>200 ml <br> &#8377; 565</p>
								</div>
							</div>
							<div class="add-to-cart">
								<a href="#" class="regime-shop">Shop Now</a>
							</div>
						</div>
					</a>
				</div>
			-->
			</center>
		</div>
	</div>

