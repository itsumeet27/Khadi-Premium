<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/core/init.php';	
	include 'includes/header.php';
	//Delete Product
	if(isset($_GET['delete'])){
		$id = sanitize($_GET['delete']);
		$db->query("UPDATE products SET deleted = 1 WHERE id = '$id'");
		header('Location: products.php');
	}
	$dbpath = '';
	if(isset($_GET['add']) || isset($_GET['edit'])){
		$parentQuery = $db->query("SELECT * FROM categories WHERE parent = 0 ORDER BY category");
		$title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
		$sku = ((isset($_POST['sku']) && $_POST['sku'] != '')?sanitize($_POST['sku']):'');
		$parent = ((isset($_POST['parent']) && !empty($_POST['parent']))?sanitize($_POST['parent']):'');
		$category = ((isset($_POST['child'])) && !empty($_POST['child'])?sanitize($_POST['child']):'');
		$price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):'');
		$list_price = ((isset($_POST['list_price']) && $_POST['list_price'] != '')?sanitize($_POST['list_price']):'');
		$weight = ((isset($_POST['weight']) && $_POST['weight'] != '')?sanitize($_POST['weight']):'');
		$short_desc = ((isset($_POST['short_desc']) && $_POST['short_desc'] != '')?sanitize($_POST['short_desc']):'');
		$long_desc = ((isset($_POST['long_desc']) && $_POST['long_desc'] != '')?sanitize($_POST['long_desc']):'');
		$tagline = ((isset($_POST['tagline']) && $_POST['tagline'] != '')?sanitize($_POST['tagline']):'');
		$stock = ((isset($_POST['stock']) && $_POST['stock'] != '')?sanitize($_POST['stock']):'');
		$cat_name = ((isset($_POST['cat_name']) && $_POST['cat_name'] != '')?sanitize($_POST['cat_name']):'');
		$saved_image = '';
		if(isset($_GET['edit'])){
			$edit_id = (int)$_GET['edit'];
			$productResults = $db->query("SELECT * FROM products WHERE id = '$edit_id'");
			$product = mysqli_fetch_assoc($productResults);
			if(isset($_GET['delete_image'])){
				$image_url = $_SERVER['DOCUMENT_ROOT'].$product['image'];
				unlink($image_url);
				$db->query("UPDATE products SET image = '' WHERE id = '$edit_id'");
				header('Location: products.php?edit='.$edit_id);
			}
			$category = ((isset($_POST['child']) && $_POST['child'] != '')?sanitize($_POST['child']):$product['categories']);
			$title = ((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):$product['title']);
			$sku = ((isset($_POST['sku']) && $_POST['sku'] != '')?sanitize($_POST['sku']):$product['sku']);
			$parentQ = $db->query("SELECT * FROM categories WHERE id = '$category'");
			$parentResult = mysqli_fetch_assoc($parentQ);
			$parent = ((isset($_POST['parent']) && $_POST['parent'] != '')?sanitize($_POST['parent']):$parentResult['parent']);
			$price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):$product['price']);
			$list_price = ((isset($_POST['list_price']) && $_POST['list_price'] != '')?sanitize($_POST['list_price']):$product['list_price']);
			$weight = ((isset($_POST['weight']) && $_POST['weight'] != '')?sanitize($_POST['weight']):$product['weight']);
			$short_desc = ((isset($_POST['short_desc']) && $_POST['short_desc'] != '')?sanitize($_POST['short_desc']):$product['short_desc']);
			$long_desc = ((isset($_POST['long_desc']) && $_POST['long_desc'] != '')?sanitize($_POST['long_desc']):$product['long_desc']);
			$tagline = ((isset($_POST['tagline']) && $_POST['tagline'] != '')?sanitize($_POST['tagline']):$product['tagline']);
			$stock = ((isset($_POST['stock']) && $_POST['stock'] != '')?sanitize($_POST['stock']):$product['stock']);
			$saved_image = (($product['image'] != '')?$product['image']:'');
			$dbpath = $saved_image;
			$cat_name = ((isset($_POST['cat_name']) && $_POST['cat_name'] != '')?sanitize($_POST['cat_name']):$product['cat_name']);
		}
		if($_POST){
			$errors = array();
			$required = array('title', 'price', 'parent', 'child', 'short_desc', 'long_desc', 'sku', 'weight', 'tagline','stock','cat_name');
			foreach ($required as $field) {
				if($_POST[$field] == ''){
					$errors[] = 'All fields with * are required';
					break;
				}
			}
			if(!empty($_FILES)){
				$photo = $_FILES['photo'];
				$name = $photo['name'];
				$nameArray = explode('.',$name);
				$fileName = $nameArray[0];
				$fileExt = $nameArray[1];
				$mime = explode('/',$photo['type']);
				$mimeType = $mime[0];
				$mimeExt = $mime[1];
				$tmpLoc = $photo['tmp_name'];
				$fileSize = $photo['size'];
				$allowed = array('png','jpg','jpeg','gif');
				$uploadName = md5(microtime()).'.'.$fileExt;
				$uploadPath = BASEURL.'images/products/'.$uploadName;
				$dbpath = '/khadi/images/products/'.$uploadName;
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
			if(!empty($errors)){
				echo display_errors($errors);
			}else{
				//Upload file and insert into database
				if(!empty($_FILES)){
					move_uploaded_file($tmpLoc, $uploadPath);
				}
				
				$insertSql = "INSERT INTO products (`title`,`sku`,`price`,`list_price`,`categories`,`image`,`tagline`,`short_desc`,`long_desc`,`weight`,`stock`, `cat_name`) VALUES ('$title','$sku','$price','$list_price','$category','$dbpath','$tagline','$short_desc','$long_desc','$weight','$stock', '$cat_name')";
					if(isset($_GET['edit'])){
						$insertSql = "UPDATE products SET title = '$title', sku = '$sku', price = '$price', list_price = '$list_price', categories = '$category', image = '$dbpath', tagline = '$tagline', short_desc = '$short_desc', long_desc = '$long_desc', weight = '$weight', stock = '$stock', cat_name = '$cat_name' WHERE id = '$edit_id'";
					}
				$db->query($insertSql);
				
			}
		}
		?>
		<div class="container">
		<h2 class="text-center"><?=((isset($_GET['edit']))?'Edit':'Add');?> Product</h2>
		<form action="products.php?<?=((isset($_GET['edit']))?'edit='.$edit_id:'add=1');?>" method="post" enctype="multipart/form-data">
			<table class="table table-responsive table-striped">
				<tr>
					<th>Title*</th>
					<td><input type="text" class="form-control" name="title" id="title" value="<?=$title;?>"></td>
				</tr>
				<tr>
					<th>Parent Category*</th>
					<td>
						<select class="form-control" id="parent" name="parent">
						<option value=""<?=(($parent == '')?' selected':'');?>></option>
						<?php while($p = mysqli_fetch_assoc($parentQuery)):?>
							<option value="<?=$p['id'];?>"<?=(($parent == $p['id'])?' selected':'');?>><?=$p['category'];?></option>
						<?php endwhile;?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Child Category*:</th>
					<td><select id="child" name="child" class="form-control"></select></td>
				</tr>
				<tr>
					<th>SKU Code*</th>
					<td><input type="text" name="sku" id="sku" class="form-control" value="<?=$sku;?>"></td>
				</tr>
				<tr>
					<th>Price*</th>
					<td><input type="text" name="price" id="price" class="form-control" value="<?=$price;?>"></td>
				</tr>
				<tr>
					<th>List Price*</th>
					<td>
						<input type="text" name="list_price" id="list_price" class="form-control" value="<?=$list_price;?>">
					</td>
				</tr>
				<tr>
					<th>Weight*</th>
					<td><input type="text" name="weight" id="weight" class="form-control" value="<?=$weight;?>"></td>
				</tr>
				<tr>
					<?php if($saved_image != ''): ?>
					<td class="saved-image">
						<img src="<?=$saved_image;?>" alt="saved image" />
					</td>
						<td class="del-image">
							<a href="products.php?delete_image=1&edit=<?=$edit_id;?>" class=" btn btn-danger text-danger">Delete Image</a>
						</td>
					</div>
					<?php else: ?>
						<th>Photo*</th>
						<td><input type="file" name="photo" class="form-control" id="photo"></td>
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
					<th>Tagline*</th>
					<td><textarea id="tagline" name="tagline" class="form-control" rows="1"><?=$tagline;?></textarea></td>
				</tr>	
				<tr>
					<th>Stock*</th>
					<td><textarea id="stock" name="stock" class="form-control" rows="1"><?=$stock;?></textarea></td>
				</tr>
				<tr>
					<th>Category Name*</th>
					<td><input type="text" id="cat_name" name="cat_name" class="form-control" value="<?=$cat_name;?>" placeholder="Eg: skin-care, hair-care, body-care, bath-and-beauty"></td>
				</tr>
				<tr>
					<td><input type="submit" name="add" value="<?=((isset($_GET['edit']))?'Edit':'Add');?> Product" class="btn btn-success"></td>
					<td><input type="reset" name="reset" value="Reset Product" class="btn btn-success"></td>
					<td><a href="products.php" class="btn btn-info form-control">Cancel</a></td>
				</tr>				
			</table>
		</form>
	</div>
	<?php } 
	else{
		$sql = "SELECT * FROM products WHERE deleted = 0";
		$presults = $db->query($sql);
		if(isset($_GET['featured'])){
			$id = (int)$_GET['id'];
			$featured = (int)$_GET['featured'];
			$featuresql = "UPDATE products SET featured = '$featured' WHERE id = '$id'";
			$db->query($featuresql);
		}
?>
<div class="container-fluid">
	<h2 class="text-center">Products</h2>
	<a href="products.php?add=1" class="btn btn-success" id="add-product-btn">Add Product</a>
	<div class="clearfix"></div>
	<table class="table table-responsive">
		<thead>
			<th></th>
			<th>Product</th>
			<th>Price</th>
			<th>Category</th>
			<th>Featured</th>
			<th>Sold</th>
		</thead>
		<tbody>
			<?php while($product = mysqli_fetch_assoc($presults)):
				$childId = $product['categories'];
				$catSql = "SELECT * FROM categories WHERE id = '$childId'";
				$result = $db->query($catSql);
				$child = mysqli_fetch_assoc($result);
				$parentId = $child['parent'];
				$pSql = "SELECT * FROM categories WHERE id = '$parentId'";
				$presult = $db->query($pSql);
				$parent = mysqli_fetch_assoc($presult);
				$category = $parent['category'].' - '.$child['category'];
			?>
				<tr>
					<td>
						<a href="products.php?edit=<?=$product['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="products.php?delete=<?=$product['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
					<td><?=$product['title'];?></td>
					<td><?=money($product['price']);?></td>
					<td><?=$category;?></td>
					<td>
						<a href="products.php?featured=<?=(($product['featured'] == 0)?'1':'0');?>&id=<?=$product['id'];?>" class="btn btn-xs btn-default">
							<span class="glyphicon glyphicon-<?=(($product['featured'] == 1)?'minus':'plus');?>"></span>
						</a>
						&nbsp;<?=(($product['featured'] == 1)?'Featured Product':'Not Featured');?>
					</td>
					<td>0</td>
				</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</div>

<?php } include 'includes/footer.php'; ?>

<script type="text/javascript">
	jQuery('document').ready(function(){
		get_child_options('<?=$category;?>');
	});
</script>