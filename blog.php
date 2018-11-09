<?php include('includes/header.php');?>

<?php 
	$sql = "SELECT * FROM blog WHERE deleted=0";
	$blogs = $db->query($sql);
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
				<a href=""><h1 class="white-text h1-responsive">Blogs</h1></a>
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="container-fluid">
		<br>
		<div class="row">
			<?php while($blog = mysqli_fetch_assoc($blogs)): ?>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="blog">
					<div class="blog-img">
						<?php $photos = explode(',',$blog['image']); ?>
						<a href="posts.php?blog_id=<?=$blog['id'];?>"><img src="<?= $photos[0]; ?>" class="img-fluid" alt="<?= $blog['title']; ?>"></a>
					</div>
					<div class="blog-title">
						<a href="posts.php?blog_id=<?=$blog['id'];?>"><h4 class="text-center"><?=$blog['title']; ?></h4></a>
					</div>
					<div class="blog-desc">
						<h5 class="text-center"><b><?=$blog['author']; ?> | <?= $blog['date']; ?></b></h5>
						<p>				
						<?=nl2br($blog['short_desc']); ?>			
							<a href="posts.php?blog_id=<?=$blog['id'];?>">Read More</a>
						</p>
					</div>
				</div>
			</div>
		<?php endwhile;?>
		</div>
	</div>
<?php include 'includes/footer.php';?>