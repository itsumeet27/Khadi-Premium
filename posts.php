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
	
<div class="container-fluid">
	<div class="row">
		<div class='col-lg-9 col-md-9 col-sm-12 col-xs-12' style='border-right: 2px solid #ccc;'>
			<h1 class="text-center"><?php echo $title;?></h1>
			<img class="img-responsive" src="<?php echo $image;?>" alt="<?php echo $title;?>">
			<h4 class="text-center"><?php echo $author; ?> | <?php echo $date; ?></h4>
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