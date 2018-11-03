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
	// $blogQuery = $db->query("SELECT * FROM blog WHERE id = '{$blog_id}'");
	// $blog = mysqli_fetch_assoc($blogQuery);
	// $post_id = $blog['id'];
	// $postQ = $db->query("SELECT * FROM post_comment WHERE id = '{$post_id}'");
	// $post = mysqli_fetch_assoc($postQ);
	// $titles = array(json_decode($post['title'],true));
	// $idArray = array();
	// $products = array();
	// foreach($titles as $title){
	// 	$idArray[] = $title['id'];
	// }
	// $ids = implode(',',$idArray);
	// $productQ = $db->query("SELECT i.id as 'id', i.title as 'title', i.author as 'author', i.date as 'date', i.long_desc as 'long_desc', p.id = 'pid', p.name as 'name', p.email as 'email', p.message as 'message' FROM blog i LEFT JOIN post_comment p WHERE i.id = p.blog_id");
	// echo $productQ;
	// while ($p = mysqli_fetch_assoc($productQ)) {
	// 	foreach($titles as $title){
	// 		if($title['id'] == $p['id']){
	// 			$x = $title;
	// 			continue;
	// 		}
	// 	}
	// 	$products[] = array_merge($x, $p);
	// }
?>
	
<div class="container-fluid">
	<div class="row">
		<div class='col-lg-9 col-md-9 col-sm-12 col-xs-12' style='border-right: 2px solid #ccc;'>
			<h1 class="text-center"><?php echo $title;?></h1>
			<img class="img-responsive" src="<?php echo $image;?>" alt="<?php echo $title;?>">
			<h5 class="text-center"><?php echo $author; ?> | <?php echo $date; ?></h5>
			<p style="text-align: justify;">
				<?php echo nl2br($long_desc);?>
			</p>
			<!-- <?php foreach($products as $product):  ?>
				<td><?=$product['title'];?></td>
				<td><?=$product['author'];?></td>
				<td><?=$product['long_desc'];?></td>
			<?php endforeach; ?> -->
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