
		<div id="about" class="view" style="height: 50%;background: url('../img/2054.jpg')no-repeat center center fixed;
	    -webkit-background-size: cover;
	    -moz-background-size: cover;
	    -o-background-size: cover;
	    background-size: cover;">
	      <div class="mask rgba-black-strong">
	        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
	          <div class="row d-flex justify-content-center text-center">
	            <div class="">
	              <!-- Heading -->
	              <a href=""><h1 class="white-text h1-responsive">Blog</h1></a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/core/init.php';	
	if(!is_logged_in()){
		login_error_redirect();
	}
	include 'includes/head.php';
	//Delete Blog
	if(isset($_GET['delete'])){
		$id = sanitize($_GET['delete']);
		$db->query("UPDATE blog SET deleted = 1 WHERE id = '$id'");
		header('Location: blog.php');
	}
	$dbpath = '';
	if(isset($_GET['add']) || isset($_GET['edit'])){
		$parentQuery = $db->query("SELECT * FROM blog");
		$title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
		$author = ((isset($_POST['author']) && $_POST['author'] != '')?sanitize($_POST['author']):'');
		$short_desc = ((isset($_POST['short_desc']) && $_POST['short_desc'] != '')?sanitize($_POST['short_desc']):'');
		$long_desc = ((isset($_POST['long_desc']) && $_POST['long_desc'] != '')?sanitize($_POST['long_desc']):'');
		$saved_image = '';
		if(isset($_GET['edit'])){
			$edit_id = (int)$_GET['edit'];
			$blogResults = $db->query("SELECT * FROM blog WHERE id = '$edit_id'");
			$blog = mysqli_fetch_assoc($blogResults);
			if(isset($_GET['delete_image'])){
				$imgi = (int)$_GET['imgi'] - 1;
				$images = explode(',', $blog['image']);
				$image_url = $_SERVER['DOCUMENT_ROOT'].$images[$imgi];				
				unlink($image_url);
				unset($images[$imgi]);
				$imageString = implode(',', $images);
				$db->query("UPDATE blog SET image = '{$imageString}' WHERE id = '$edit_id'");
				header('Location: blog.php?edit='.$edit_id);
			}
			
			$title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$blog['title']);
			$author = ((isset($_POST['author']) && $_POST['author'] != '')?sanitize($_POST['author']):$blog['author']);
			$short_desc = ((isset($_POST['short_desc']) && $_POST['short_desc'] != '')?sanitize($_POST['short_desc']):$blog['short_desc']);
			$saved_image = (($blog['image'] != '')?$blog['image']:'');
			$dbpath = $saved_image;
		}
		if($_POST){
			$errors = array();
			$required = array('title', 'author', 'short_desc', 'long_desc');
			$allowed = array('png','jpg','jpeg','gif');
			$uploadPath = array();
			$tmpLoc = array();
			foreach ($required as $field) {
				if($_POST[$field] == ''){
					$errors[] = 'All fields with * are required';
					break;
				}
			}
			$photoCount = count($_FILES['photo']['name']);
			if($photoCount > 0){
				for($i=0;$i<$photoCount;$i++){
					$name = $_FILES['photo']['name'][$i];
					$nameArray = explode('.',$name);
					$fileName = $nameArray[0];
					$fileExt = $nameArray[1];
					$mime = explode('/',$_FILES['photo']['type'][$i]);
					$mimeType = $mime[0];
					$mimeExt = $mime[1];
					$tmpLoc[] = $_FILES['photo']['tmp_name'][$i];
					$fileSize = $_FILES['photo']['size'][$i];
					$uploadName = md5(microtime().$i).'.'.$fileExt;
					$uploadPath[] = BASEURL.'images/blog/'.$uploadName;
					if($i != 0){
						$dbpath .= ',';
					}
					$dbpath .= '/khadi/images/blog/'.$uploadName;
					if($mimeType != 'image'){
						$errors[] = 'The file must be an image';
					}
					if(!in_array($fileExt, $allowed)){
						$errors[] = 'The file extension must be a png, jpg, jpeg, or gif';
					}
					if($fileSize > 15000000){
						$errors[] = 'The files size must be under 15 MB';
					}
					if($fileExt != $mimeExt && ($mimeExt == 'jpeg' && $fileExt != 'jpg')){
						$errors[] = 'File extension does not match the file';
					}
				}
			}
			if(!empty($errors)){
				echo display_errors($errors);
			}else{
				if($photoCount > 0){
				//Upload file and insert into database
					for($i = 0;$i<$photoCount;$i++){
					 	move_uploaded_file($tmpLoc[$i],$uploadPath[$i]);
					}	
				}
				
				$insertSql = "INSERT INTO blog (`title`,`author`,`image`,`short_desc`,`long_desc`) VALUES ('$title','$author','$dbpath','$short_desc','$long_desc')";
					if(isset($_GET['edit'])){
						$insertSql = "UPDATE blog SET title = '$title', author = '$author', image = '$dbpath', short_desc = '$short_desc', long_desc = '$long_desc' WHERE id = '$edit_id'";
					}
				$db->query($insertSql);
				
			}
		}
		?>
		<div class="container table-responsive">
		<h2 class="text-center px-3 py-3"><?=((isset($_GET['edit']))?'Edit':'Add');?> Blog</h2>
		<form action="blog.php?<?=((isset($_GET['edit']))?'edit='.$edit_id:'add=1');?>" method="post" enctype="multipart/form-data">
			<table class="table table-striped" style="display: table;">
				<tr>
					<th>Title*</th>
					<td><input type="text" class="form-control" name="title" id="title" value="<?=$title;?>"></td>
				</tr>
				<tr>
					<th>Author*</th>
					<td><input type="text" name="author" id="author" class="form-control" value="<?=$author;?>"></td>
				</tr>
				<tr>
					<?php if($saved_image != ''): ?>
						<?php 
							$imgi = 1;
							$images = explode(',', $saved_image);
						?>
					<?php foreach($images as $image): ?>
					<td class="saved-image">
						<img src="<?=$image;?>" alt="saved image" class="img-fluid" />
					</td>
					<td class="del-image">
						<a href="blog.php?delete_image=1&edit=<?=$edit_id;?>&imgi=<?=$imgi;?>" class=" btn btn-danger text-danger">Delete Image</a>
					</td>
					<?php 
						$imgi++;
						endforeach;?>
					<?php else: ?>
						<th>Photo*</th>
						<td><input type="file" name="photo[]" class="form-control" id="photo" multiple></td>
					<?php endif; ?>
				</tr>
				<tr>
					<th>Short Description*</th>
					<td><textarea id="short_desc" name="short_desc" class="form-control" rows="3"><?=$short_desc;?></textarea></td>
				</tr>
				<tr>
					<th>Long Description*</th>
					<td><textarea id="long_desc" name="long_desc" class="form-control" rows="6"><?=$long_desc;?></textarea></td>
				</tr>
				<tr>
					<td><button type="submit" name="add" value="" class="btn btn-success"><?=((isset($_GET['edit']))?'Edit':'Add');?> Blog</button></td>
				</tr>				
			</table>
		</form>
	</div>
	<?php } 
	else{
		$sql = "SELECT * FROM blog WHERE deleted = 0";
		$presults = $db->query($sql);
		if(isset($_GET['featured'])){
			$id = (int)$_GET['id'];
			$featured = (int)$_GET['featured'];
			$featuresql = "UPDATE blog SET featured = '$featured' WHERE id = '$id'";
			$db->query($featuresql);
		}
?>
<div class="container-fluid table-responsive">	
	<a href="blog.php?add=1" class="btn btn-success px-3 py-3" id="add-product-btn">Add Blog</a>
	<div class="clearfix"></div><br>
	<table class="table table-striped table-bordered" style="display: table;">
		<thead>
			<th></th>
			<th><h5 class="h5-responsive"><b>Blog title</b></h5></th>
			<th><h5 class="h5-responsive"><b>Author</b></h5></th>
			<th><h5 class="h5-responsive"><b>Short Description</b></h5></th>
			<th><h5 class="h5-responsive"><b>Long Description</b></h5></th>
			<th><h5 class="h5-responsive"><b>Featured</b></h5></th>
		</thead>
		<tbody>
			<?php 
				$sql = "SELECT * FROM blog WHERE deleted = 0";
				$blogs = $db->query($sql);
			?>

			<?php while($blog = mysqli_fetch_assoc($blogs)):?>
				<tr>
					<td>
						<a href="blog.php?edit=<?=$blog['id'];?>"><i class="fa fa-pencil-square fa-lg"></i></a>
						<a href="blog.php?delete=<?=$blog['id'];?>"><i class="fa fa-trash fa-lg"></i></a>
					</td>
					<td><?=$blog['title'];?></td>
					<td><?=$blog['author'];?></td>
					<td><?=$blog['short_desc'];?></td>
					<td><?=$blog['long_desc'];?></td>
					<td>
						<a href="blog.php?featured=<?=(($blog['featured'] == 0)?'1':'0');?>&id=<?=$blog['id'];?>">
							<i class="fa fa-<?=(($blog['featured'] == 1)?'minus-circle':'plus-circle');?> fa-lg"></i>
						</a>
						&nbsp;<?=(($blog['featured'] == 1)?'Featured Blog':'Not Featured');?>
					</td>
				</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</div>

<?php } include 'includes/footer.php'; ?>