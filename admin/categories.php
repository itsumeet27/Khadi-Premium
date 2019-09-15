<?php
	session_start();
	if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php 
	require_once '../core/init.php';
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
              <a href=""><h1 class="white-text h1-responsive">Categories</h1></a>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="container-fluid">
	<div class="row">
		<!--Form for Category-->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<form class="form" action="categories.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="post">
				<legend class="px-3 py-3"><?=((isset($_GET['edit']))?'Edit':'Add a');?> Category</legend>
				<div id="errors"></div>
				<div class="=form-group">
					<label for="parent">Parent</label>
					<select class="form-control" name="parent" id="parent">
						<option value="0"<?=(($parent_value == 0)?'selected = "selected"':'');?>>Parent</option>
						<?php while($parent = mysqli_fetch_assoc($result)) : ?>
							<option value="<?=$parent['id'];?>"<?=(($parent_value == $parent['id'])?'selected = "selected"':'');?>><?=$parent['category'];?></option>
						<?php endwhile;?>
					</select>
				</div><br>
				<div class="form-group">
					<label for="category">Category</label>
					<input type="text" class="form-control" name="category" id="category" value="<?=$category_value;?>">
				</div>
				<div class="form-group">
					<button type="submit" value="" class="btn text-white" style="background: #1c2a48;" name="add_cat"><?=((isset($_GET['edit']))?'Edit':'Add');?> Category</button>
				</div>
			</form>
		</div>

		<!--Category Table-->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-1 table-responsive2">
			<table class="table" style="display: table;">
				<thead>
					<th><h5 class="h5-responsive"><b>Category</b></h5></th>
					<th><h5 class="h5-responsive"><b>Parent</b></h5></th>

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
					<tr style="background: #1c2a48; color: #fff;">
						<td><h6 class="h6-responsive"><b><?=$parent['category'];?></b></h6></td>
						<td><h6 class="h6-responsive"><b>Parent</b></h6></td>
						<td>
							<a href="categories.php?edit=<?=$parent['id'];?>" class=""><i class="fa fa-pencil-square fa-lg" style="color: #fff"></i></a>
							<a href="categories.php?delete=<?=$parent['id'];?>" class=""><i class="fa fa-trash fa-lg" style="color: #fff"></i></a>
						</td>
					</tr>
					<?php while($child = mysqli_fetch_assoc($cresult)): ?>
					<tr style="background: #d0d6e2;">
						<td><?=$child['category'];?></td>
						<td><?=$parent['category'];?></td>
						<td>
							<a href="categories.php?edit=<?=$child['id'];?>" class=""><i class="fa fa-pencil-square fa-lg"></i></a>
							<a href="categories.php?delete=<?=$child['id'];?>" class=""><i class="fa fa-trash fa-lg"></i></a>
						</td>
					</tr>
					<?php endwhile;?>
					<?php endwhile;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php } include 'includes/footer.php'; ?>