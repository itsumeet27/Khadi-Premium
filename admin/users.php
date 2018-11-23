<?php

	include('includes/head.php');
	include('../core/init.php');
?>

<?php
	$sql = "SELECT * FROM review";
	$revSql = $db->query($sql);
?>

<?php
	$commentsql = "SELECT * FROM comments";
	$comSql = $db->query($commentsql);
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
              <a href=""><h1 class="white-text h1-responsive">Customer Responses</h1></a>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 table-responsive">
			<h2 class="h2-responsive p-3 text-center">Product Reviews</h2>
				<table class="table table-striped table-condensed table-bordered" style="display: table;">
					<thead>
						
						<th><h5 class="h5-responsive"><b>Name</b></h5></th>
						<th><h5 class="h5-responsive"><b>Email</b></h5></th>
						<th><h5 class="h5-responsive"><b>Product</b></h5></th>
						<th><h5 class="h5-responsive"><b>Tagline</b></h5></th>
						<th><h5 class="h5-responsive"><b>Message</b></h5></th>
					</thead>
					<tbody>
					<?php while($review = mysqli_fetch_assoc($revSql)): ?>
						<tr>							
							<td><?=$review['name'];?></td>
							<td><?=$review['email'];?></td>
							<td><?=$review['product'];?></td>
							<td><?=$review['tagline'];?></td>
							<td><?=$review['message'];?></td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 table-responsive">
			<h2 class="h2-responsive p-3 text-center">Blog Comments</h2>			
				<table class="table table-striped table-condensed table-bordered" style="display: table;">
					<thead>						
						<th><h5 class="h5-responsive"><b>Name</b></h5></th>
						<th><h5 class="h5-responsive"><b>Email</b></h5></th>
						<th><h5 class="h5-responsive"><b>Blog</b></h5></th>
						<th><h5 class="h5-responsive"><b>Tagline</b></h5></th>
						<th><h5 class="h5-responsive"><b>Message</b></h5></th>
					</thead>
					<tbody>
					<?php while($comment = mysqli_fetch_assoc($comSql)): ?>
						<tr>							
							<td><?=$comment['name'];?></td>
							<td><?=$comment['email'];?></td>
							<td><?=$comment['blog'];?></td>
							<td><?=$comment['tagline'];?></td>
							<td><?=$comment['message'];?></td>
						</tr>						
					<?php endwhile; ?>
					</tbody>
				</table>
		</div>
	</div>
</div>

<?php
	include 'includes/footer.php';
?>