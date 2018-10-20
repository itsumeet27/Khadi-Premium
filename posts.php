<?php 
	include('core/init.php');
	include('includes/header.php');
	include('includes/functions.php');
?>


<?php 
	$sql = "SELECT * FROM blog WHERE deleted=0";
	$blogs = $db->query($sql);
?>
	
<div class="container-fluid">
	<div class="row">
		<div class='col-lg-9 col-md-9 col-sm-12 col-xs-12' style='border-right: 2px solid #ccc;'>
			<?php getPost(); ?>
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