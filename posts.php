<?php 
	include('core/init.php');
	include('includes/header.php');
	include('includes/functions.php');
?>


<?php 
	if(isset($_GET['blog_id'])){
		$id = sanitize((int)$_GET['blog_id']);
		$sql = "SELECT * FROM blog WHERE id = '$id'";
		$sqlResult = $db->query($sql);
		$blogCount = mysqli_num_rows($sqlResult);
		if($blogCount > 0){
			while ($row = mysqli_fetch_array($sqlResult)) {
				$id = $row['id'];
				$image = $row['image'];
				$title = $row['title'];
				$author = $row['author'];
				$long_desc = $row['long_desc'];
				$date = $row['date'];
				
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
				<a href=""><h1 class="white-text h1-responsive">Blog Details</h1></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class='col-lg-9 col-md-9 col-sm-12 col-xs-12'>
			<h1 class="text-center h1-responsive"><?php echo $title;?></h1>
			<img class="img-fluid" src="<?php echo $image;?>" alt="<?php echo $title;?>">
			<h4 class="text-center h4-responsive"><?php echo $author; ?> | <?php echo $date; ?></h4>
			<p style="text-align: justify;">
				<?php echo nl2br($long_desc);?>
			</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<ul style="list-style-type: none">
				<li style="padding: 0.5em;"><h4><a href="blog.php">Recent Posts</a></h4></li>
				<?php getBlog(); ?>
			</ul>
		</div>
	</div>
</div>


<?php include('includes/footer.php');?>