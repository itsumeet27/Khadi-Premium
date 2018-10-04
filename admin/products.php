<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/core/init.php';	
	include 'includes/header.php';
	if(isset($_GET['add'])){
		$parentQuery = $db->query("SELECT * FROM categories WHERE parent = 0 ORDER BY category");
		if($_POST){
			$title = sanitize($_POST['title']);
			$categories = sanitize($_POST['child']);
			$dbpath = '';
			$price = sanitize($_POST['price']);
			$list_price = sanitize($_POST['list_price']);
			$sku = sanitize($_POST['sku']);
			$weight = sanitize($_POST['weight']);
			$short_desc = sanitize($_POST['short_desc']);
			$long_desc = sanitize($_POST['long_desc']);
			$tagline = sanitize($_POST['tagline']);
			$stock = sanitize($_POST['stock']);
			$errors = array();
			$required = array('title', 'price', 'parent', 'child', 'short_desc', 'long_desc', 'sku', 'weight', 'tagline');
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
				move_uploaded_file($tmpLoc, $uploadPath);
				$insertSql = "INSERT INTO products (`title`,`sku`,`price`,`list_price`,`categories`,`image`,`tagline`,`short_desc`,`long_desc`,`weight`,`stock`) VALUES ('$title','$sku','$price','$list_price','$categories','$dbpath','$tagline','$short_desc','$long_desc','$weight','$stock')";
				$db->query($insertSql);
			}
		}


		?>
		<div class="container">
		<h2 class="text-center">Add a new Product</h2>
		<form action="products.php?add=1" method="post" enctype="multipart/form-data">
			<table class="table table-responsive table-striped">
				<tr>
					<th>Title*</th>
					<td><input type="text" class="form-control" name="title" id="title" value="<?=((isset($_POST['title']))?sanitize($_POST['title']):'');?>"></td>
				</tr>
				<tr>
					<th>Parent Category*</th>
					<td>
						<select class="form-control" id="parent" name="parent">
						<option value=""<?=((isset($_POST['parent']) && $_POST['parent'] == '')?' selected':'');?>></option>
						<?php while($parent = mysqli_fetch_assoc($parentQuery)):?>
							<option value="<?=$parent['id'];?>"<?=((isset($_POST['parent']) && $_POST['parent'] == $parent['id'])?' select':'');?>><?=$parent['category'];?></option>
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
					<td><input type="text" name="sku" id="sku" class="form-control" value="<?=((isset($_POST['sku']))?sanitize($_POST['sku']):'');?>"></td>
				</tr>
				<tr>
					<th>Price*</th>
					<td><input type="text" name="price" id="price" class="form-control" value="<?=((isset($_POST['price']))?sanitize($_POST['price']):'');?>"></td>
				</tr>
				<tr>
					<th>List Price*</th>
					<td>
						<input type="text" name="list_price" id="list_price" class="form-control" value="<?=((isset($_POST['list_price']))?sanitize($_POST['list_price']):'');?>">
					</td>
				</tr>
				<tr>
					<th>Weight*</th>
					<td><input type="text" name="weight" id="weight" class="form-control" value="<?=((isset($_POST['weight']))?sanitize($_POST['weight']):'');?>"></td>
				</tr>
				<tr>
					<th>Photo*</th>
					<td><input type="file" name="photo" class="form-control" id="photo"></td>
				</tr>
				<tr>
					<th>Short Description*</th>
					<td><textarea id="short_desc" name="short_desc" class="form-control" rows="3"><?=((isset($_POST['short_desc']))?sanitize($_POST['short_desc']):'');?></textarea></td>
				</tr>
				<tr>
					<th>Long Description*</th>
					<td><textarea id="long_desc" name="long_desc" class="form-control" rows="6"><?=((isset($_POST['long_desc']))?sanitize($_POST['long_desc']):'');?></textarea></td>
				</tr>
				<tr>
					<th>Tagline*</th>
					<td><textarea id="tagline" name="tagline" class="form-control" rows="1"><?=((isset($_POST['tagline']))?sanitize($_POST['tagline']):'');?></textarea></td>
				</tr>	
				<tr>
					<th>Stock*</th>
					<td><textarea id="stock" name="stock" class="form-control" rows="1"><?=((isset($_POST['stock']))?sanitize($_POST['stock']):'');?></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="add" value="Add Product" class="btn btn-success form-control"></td>
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