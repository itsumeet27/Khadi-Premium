<?php include('includes/header.php');?>

<?php 
	$sql = "SELECT * FROM blog WHERE deleted=0";
	$blogs = $db->query($sql);
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
		<div class="row">
			<?php while($blog = mysqli_fetch_assoc($blogs)): ?>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="blog">
					<div class="blog-img">
						<?php $photos = explode(',',$blog['image']); ?>
						<a href="posts.php?<?=$blog['id'];?>"><img src="<?= $photos[0]; ?>" class="img-responsive" alt="<?= $blog['title']; ?>"></a>
					</div>
					<div class="blog-title">
						<a href="posts.php?<?=$blog['id'];?>"><h4 class="text-center"><?=$blog['title']; ?></h4></a>
					</div>
					<div class="blog-desc">
						<h5 class="text-center"><b><?=$blog['author']; ?> | <?= $blog['date']; ?></b></h5>
						<p>				
						<?=nl2br($blog['short_desc']); ?>			
							<a href="posts.php?<?=$blog['id'];?>">Read More</a>
						</p>
					</div>
				</div>
			</div>
		<?php endwhile;?>
		</div>
	</div>