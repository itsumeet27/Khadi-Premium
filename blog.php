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

	<section class="container-fluid">
		<div class="row px-4 py-4">
			<?php while($blog = mysqli_fetch_assoc($blogs)): ?>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="blog px-3 py-3" style="box-shadow: 0px 4px 10px 0px rgba(0,0,0,0.5); border-radius: 10px;background: #fff">
					<div class="blog-img">
						<?php $photos = explode(',',$blog['image']); ?>
						<a href="posts.php?blog_id=<?=$blog['id'];?>"><img src="<?= $photos[0]; ?>" class="img-fluid" alt="<?= $blog['title']; ?>"></a>
					</div>
					<div class="blog-title">
						<a href="posts.php?blog_id=<?=$blog['id'];?>"><h4 class="text-center px-2 py-2" style="color: #1c2a48"><b><?=$blog['title']; ?></b></h4></a>
					</div>
					<div class="blog-desc">
						<h6 class="text-center px-2 py-2"><b><?=$blog['author']; ?> | <?= $blog['date']; ?></b></h6>
						<p style="text-align: justify;">				
						<?=nl2br($blog['short_desc']); ?>			
							<a href="posts.php?blog_id=<?=$blog['id'];?>">Read More</a>
						</p>
					</div>
				</div>
				<br>
			</div>
		<?php endwhile;?>
		</div>
	</section>
<?php include 'includes/footer.php';?>