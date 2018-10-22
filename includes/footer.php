<footer>	
	<center>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">		
				<div class="foot-widget">	
					<ul style="list-style: none">
						<h4 class="text-center">Who Are We</h4>
						<li><a href="about.php">About Us</a></li>
						<li><a href="blog.php">Our Blog</a></li>
						<li><a href="contact.php">Contact Us</a></li>
					</ul>
				</div>			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">		
				<div class="foot-widget">	
					<ul style="list-style: none">
						<h4 class="text-center">Quick Links</h4>
						<li><a href="beauty-regime.php">Beauty Regime</a></li>
						<li><a href="products.php">All Products</a></li>
						<li><a href="docs/privacy-policy.php">Privacy Policy</a></li>
					</ul>
				</div>			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">		
				<div class="foot-widget">	
					<ul style="list-style: none">
						<h4 class="text-center">Customer Care</h4>
						<li><a href="docs/delivery-and-returns.php">Delivery & Returns</a></li>
						<li><a href="docs/terms-and-conditions.php">Terms & Conditions</a></li>
						<li><a href="docs/frequently-asked-questions.php">Frequently Asked Questions</a></li>
					</ul>
				</div>			
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">		
				<div class="foot-widget">	
					<ul style="list-style: none">
						<h4 class="text-center">Connect With Us</h4>
						<li><a href="https://www.facebook.com/khadipremium">Facebook</a></li>
						<li><a href="https://www.instagram.com/khadipremium">Instagram</a></li>
						<li><a href="">Youtube</a></li>
					</ul>
				</div>			
			</div>			
		</div>
	</center>
</footer>
	<div class="footer-rights">
		<h5 class="text-center">All Rights Reserved | &copy; Khadi Premium Cosmetics - 2018</h5>
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

		function update_cart(mode,edit_id){
			var data = {"mode" : mode, "edit_id" : edit_id};
			jQuery.ajax({
				url : '/khadi/admin/parsers/update_cart.php',
				method : "post",
				data : data,
				success : function(){
					location.reload();
				},
				error : function(){
					alert("Something went wrong");
				},
			});
		}
	</script>	
</body>
</html>