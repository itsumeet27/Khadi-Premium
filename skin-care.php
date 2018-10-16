<?php 
	include('core/init.php');
	include('includes/functions.php');
	include('includes/header.php'); 
?>

<style type="text/css">
	@media (min-width: 991px) {

	  .sidebar-nav .navbar .navbar-collapse {
	    padding: 0;
	    max-height: none;
	  }
	  .sidebar-nav .navbar ul {
	    float: none;
	    display: block;
	  }
	  .sidebar-nav .navbar li {
	    float: none;
	    display: block;
	  }
	  .sidebar-nav .navbar li a {
	    padding-top: 12px;
	    padding-bottom: 12px;
	  }
	}
</style>

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

	<div class="container-fluid">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<h3 class="text-center">Categories</h3>
			<div class="sidebar-nav">
				<div class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
					    <span class="sr-only">Toggle navigation</span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					  </button>
					  <span class="visible-xs navbar-brand">Sidebar menu</span>
					</div>
					<div class="navbar-collapse collapse sidebar-navbar-collapse">
					  <ul class="nav navbar-nav">
						<li style="padding: 0.5em;"><a href="skin-care.php">All Products</a></li>
						<?php getSkinCare(); ?>
					  </ul>
					</div><!--/.nav-collapse -->
				</div>
		    </div>
			<ul style="list-style: none;">
				
			</ul>
		</div>
		
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="row">
				<?php getSkinPro(); ?>
				<?php getCatSkinPro(); ?>
			</div>
		</div>				
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
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

	