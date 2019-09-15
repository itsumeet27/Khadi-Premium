<?php 
	include('core/init.php');
	include('includes/header.php');
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

<div id="about" class="view" style="height: 50%;background: url('img/ban.JPG')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 20em 2em">
      <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-md-10">
              <a href=""><img src="img/Logo.png" class="img-fluid" style="width: 400px;"></a>
              <hr class="hr-light">
              <h4 class="white-text my-4 h1-responsive" style="font-family: 'Cookie', cursive;">Blog Description</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="container-fluid">
	<div class="row">
		<div class='col-lg-9 col-md-9 col-sm-12 col-xs-12 px-3 py-3'>
			<h1 class="text-center h1-responsive px-2 py-2"><b><?php echo $title;?></b></h1>
			<img class="img-fluid" src="<?php echo $image;?>" alt="<?php echo $title;?>">
			<h4 class="text-center h4-responsive px-3 py-3"><?php echo $author; ?> | <?php echo $date; ?></h4>
			<p style="text-align: justify;">
				<?php echo nl2br($long_desc);?>
			</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 px-3 py-3">
			<ul style="list-style-type: none">
				<li style="padding: 0.5em;"><h4><a href="blog.php" style="color: #000;font-weight: bolder;">Recent Posts</a></h4></li>
				<?php getBlog(); ?>
			</ul>
		</div>
	</div>
	<!-- <div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2">Leave Your Comments</h3>
		</div>
		<form class="p-3 grey-text" method="post" action="thankyoublog.php">
            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
              <input type="text" id="form16" class="form-control form-control-sm" name="blog_name">
              <label for="name">Your name</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
              <input type="text" id="form17" class="form-control form-control-sm" name="blog_email">
              <label for="email">Your email</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
              <input type="text" id="form18" class="form-control form-control-sm" name="blog_tagline">
              <label for="headline">Your headline</label>
            </div>
            <div class="md-form form-sm" style="display: none;"> <i class="fa fa-tag prefix"></i>
              <input type="text" id="form19" class="form-control form-control-sm" name="blog" value="<?php echo $title; ?>">
              <label for="blog">Blog</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
              <textarea type="text" id="form20" class="md-textarea form-control form-control-sm" rows="4" name="blog_message"></textarea>
              <label for="review">Your review</label>
            </div>
            <div class="text-center mt-4">
              <button class="btn" type="submit" name="submit" style="background: #607d8b">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </form>
	</div>	 -->						
</div>
<br>

<?php include('includes/footer.php');?>