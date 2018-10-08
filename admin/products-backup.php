<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/khadi/core/init.php';	
	include 'includes/header.php';

	if(isset($_GET['add'])){

		$parentQuery = $db->query("SELECT * FROM categories WHERE parent = 0 ORDER BY category");
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
					<td><input type="submit" name="submit_product" value="Add Product" class="btn btn-success form-control"></td>
				</tr>				
			</table>
			<!--<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="title">Title*: </label>
				<input type="text" class="form-control" name="title" id="title" value="<?=((isset($_POST['title']))?sanitize($_POST['title']):'');?>">
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="parent">Parent Category*: </label>
				<select class="form-control" id="parent" name="parent">
					<option value=""<?=((isset($_POST['parent']) && $_POST['parent'] == '')?' selected':'');?>></option>
					<?php while($parent = mysqli_fetch_assoc($parentQuery)):?>
						<option value="<?=$parent['id'];?>"<?=((isset($_POST['parent']) && $_POST['parent'] == $parent['id'])?' select':'');?>><?=$parent['category'];?></option>
					<?endwhile;?>
				</select>
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="child">Child Category*: </label>
				<select id="child" name="child" class="form-control"></select>
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="sku">SKU Code*:</label>
				<input type="text" name="sku" id="sku" class="form-control" value="<?=((isset($_POST['sku']))?sanitize($_POST['sku']):'');?>">
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="price">Price*:</label>
				<input type="text" name="price" id="price" class="form-control" value="<?=((isset($_POST['price']))?sanitize($_POST['price']):'');?>">
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="list_price">List Price*:</label>
				<input type="text" name="list_price" id="list_price" class="form-control" value="<?=((isset($_POST['list_price']))?sanitize($_POST['list_price']):'');?>">
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="weight">Weight*:</label>
				<input type="text" name="weight" id="weight" class="form-control" value="<?=((isset($_POST['weight']))?sanitize($_POST['weight']):'');?>">
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="photo">Photo*:</label>
				<input type="file" name="photo" class="form-control" id="photo">
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="short_desc">Short Description*:</label>
				<textarea id="short_desc" name="short_desc" class="form-control" rows="3"><?=((isset($_POST['short_desc']))?sanitize($_POST['short_desc']):'');?></textarea>
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="long_desc">Long Description*:</label>
				<textarea id="long_desc" name="long_desc" class="form-control" rows="6"><?=((isset($_POST['long_desc']))?sanitize($_POST['long_desc']):'');?></textarea>
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<label for="tagline">Tagline*:</label>
				<textarea id="tagline" name="tagline" class="form-control" rows="1"><?=((isset($_POST['tagline']))?sanitize($_POST['tagline']):'');?></textarea>
			</div>
			<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<input type="submit" name="submit_product" value="Add Product" class="btn btn-success form-control">
			</div>
			<div class="clearfix"></div>-->
		</form>
	</div>
	<?php }else{
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