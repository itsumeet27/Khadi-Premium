<?php 

	require_once '../core/init.php';
	if(!is_logged_in()){
		login_error_redirect();
	}
	include 'includes/head.php';

	$sql = "SELECT * FROM categories WHERE parent = 0";
	$result = $db->query($sql);
	$errors = array();
	$category = '';
	$post_parent = '';

	//Edit Category
	if(isset($_GET['edit']) && !empty($_GET['edit'])){
		$edit_id = (int)$_GET['edit'];
		$edit_id = sanitize($edit_id);
		$edit_sql = "SELECT * FROM categories WHERE id = '$edit_id'";
		$edit_result = $db -> query($edit_sql);
		$edit_category = mysqli_fetch_assoc($edit_result);
	}

	//Delete Category
	if(isset($_GET['delete']) && !empty($_GET['delete'])){
		$delete_id = (int)$_GET['delete'];
		$delete_id = sanitize($delete_id);
		$sql = "SELECT * FROM categories WHERE id = '$delete_id'";
		$result = $db->query($sql);
		$category = mysqli_fetch_assoc($result);
		if($category['parent'] == 0){
			$sql = "DELETE FROM categories WHERE parent = '$delete_id'";
			$db->query($sql);
		}
		$dsql = "DELETE FROM categories WHERE id = '$delete_id'";
		$db->query($dsql);
	}

	//Process form
	if(isset($_POST['add_cat'])){
		$category = sanitize($_POST['category']);	
		$post_parent = sanitize($_POST['parent']);

		//If category is blank
		if($category == ''){
			$errors[] .= 'The category cannot be left blank';
		}

		//If category exists
		$sqlform = "SELECT * FROM categories WHERE category = '$category' AND parent = '$post_parent'";
		if(isset($_GET['edit'])){
			$id = $edit_category['id'];
			$sqlform = "SELECT * FROM categories WHERE category = '$category' AND parent = '$post_parent' AND id != '$id'";
		}
		$fresult = $db->query($sqlform);
		$count = mysqli_num_rows($fresult);

		if($count > 0){
			$errors[] .= $category. ' already exists. Please choose a new category.';
		}

		if(!empty($errors)){
			//Display errors
			echo display_errors($errors); ?>
			<script type="text/javascript">
				jQuery('document').ready(function(){
					jQuery('#errors').html('<?=$display; ?>');
				});
			</script>
	<?php	}else{
			//Update Database
			$updatesql = "INSERT INTO categories (category, parent) VALUES ('$category', '$parent')";
			if(isset($_GET['edit'])){
				$updatesql = "UPDATE categories SET category = '$category', parent = '$post_parent' WHERE id = '$edit_id'";
			}
			$db->query($updatesql);
		}
	}

	$category_value = '';
	$parent_value = 0;
	if(isset($_GET['edit'])){
		$category_value = $edit_category['category'];
		$parent_value = $edit_category['parent'];
	}else{
		if(isset($_POST)){
			$category_value = $category;
			$parent_value = $post_parent;
		}
	}

?>

<h2 class="text-center">Categories</h2>
<div class="container-fluid">
	<div class="row">

		<!--Form for Category-->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<form class="form" action="categories.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="post">
				<legend><?=((isset($_GET['edit']))?'Edit':'Add a');?> Category</legend>
				<div id="errors"></div>
				<div class="=form-group">
					<label for="parent">Parent</label>
					<select class="form-control" name="parent" id="parent">
						<option value="0"<?=(($parent_value == 0)?'selected = "selected"':'');?>>Parent</option>
						<?php while($parent = mysqli_fetch_assoc($result)) : ?>
							<option value="<?=$parent['id'];?>"<?=(($parent_value == $parent['id'])?'selected = "selected"':'');?>><?=$parent['category'];?></option>
						<?php endwhile;?>
					</select>
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<input type="text" class="form-control" name="category" id="category" value="<?=$category_value;?>">
				</div>
				<div class="form-group">
					<input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Add');?> Category" class="btn btn-success" name="add_cat">
				</div>
			</form>
		</div>

		<!--Category Table-->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<table class="table table-responsive ">
				<thead>
					<th>Category</th>
					<th>Parent</th>

				</thead>
				<tbody>
					<?php 
						$sql = "SELECT * FROM categories WHERE parent = 0";
						$result = $db->query($sql);
						while($parent = mysqli_fetch_assoc($result)): 
							$parent_id = (int)$parent['id'];
							$sql2 = "SELECT *FROM categories WHERE parent = '$parent_id'";
							$cresult = $db->query($sql2);
					?>
					<tr class="bg-primary">
						<td><?=$parent['category'];?></td>
						<td>Parent</td>
						<td>
							<a href="categories.php?edit=<?=$parent['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="categories.php?delete=<?=$parent['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
					<?php while($child = mysqli_fetch_assoc($cresult)): ?>
					<tr class="bg-info">
						<td><?=$child['category'];?></td>
						<td><?=$parent['category'];?></td>
						<td>
							<a href="categories.php?edit=<?=$child['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="categories.php?delete=<?=$child['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
					<?php endwhile;?>
					<?php endwhile;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php

	include 'includes/footer.php';

?>