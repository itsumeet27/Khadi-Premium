<?php 
	include('includes/header.php'); 
	include 'core/init.php';
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
              <h4 class="white-text my-4 h1-responsive" style="font-family: 'Cookie', cursive;">Search Results</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid">	
		<?php 
		
			$q = $_GET['q']; 
			$terms = explode(' ', $q);
			$query = "SELECT DISTINCT id,title,categories,image,weight,price,short_desc,tags FROM products WHERE ";			
			foreach ($terms as $each) {

				$i++;
				if($i == 1){
					$query .= "tags LIKE '%$each%' AND featured = 0 AND beauty_regime = 0 ";
					$query .= "OR weight LIKE '%$each%' AND featured = 0 AND beauty_regime = 0 ";
				}else{
					$query .= "OR tags LIKE '%$each%' AND featured = 0 AND beauty_regime = 0 "; 
					$query .= "OR weight LIKE '%$each%' AND featured = 0 AND beauty_regime = 0 ";
				}
			}
			$query = $db->query($query);
			$num_rows = mysqli_num_rows($query);
		?>
		<div class="row">
		<?php
			if($num_rows > 0){
				while ($row_pro = mysqli_fetch_assoc($query)) {
					$pro_id = $row_pro['id'];
					$pro_cat = $row_pro['categories'];
					$pro_image = $row_pro['image'];
					$pro_title = $row_pro['title'];
					$pro_weight = $row_pro['weight'];
					$pro_price = $row_pro['price'];
					$pro_short_desc = $row_pro['short_desc'];
					$photos = explode(',',$pro_image);

					echo 
					"
					
						<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4'>
							<div class='card card-cascade wider card-ecommerce'>
					            <div class='view zoom view-cascade overlay'>
					            	<img src='$photos[0]' class='card-img-top img-fluid' alt='$pro_title'>
					              	<button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'>
					              		<div class='mask rgba-white-slight'></div>
					              	</button>
					            </div>
            					<div class='card-body card-body-cascade text-center'>
                  					<h5>
					                    <strong>
					                        <button onclick='detailsmodal($pro_id)' style='background: none;border: none;cursor: pointer'><b>$pro_title</b></button>
					                        <br>
					                            <span class='badge badge-pill my-2 z-depth-0' style='background-color: #546e7a'>&#8377; $pro_price</span>
						                			&nbsp;&nbsp;&nbsp;
						                		<span class='badge badge-pill my-2 z-depth-0' style='background-color: #546e7a'>$pro_weight</span>
					                        
					                    </strong>
					                </h5>
                  					<h6 class=''>$pro_short_desc</h6>
              					</div>
              					<div class='card-footer px-1 px-3 py-3'>
				                    <span class='float-left'>
							    		<button onclick='detailsmodal($pro_id)' style='margin: 0;cursor: pointer;border:none;background: #1c2a48;border-radius: 10em;' class='btn btn-md white-text' title='Quick View'>Quick View</button>
							    	</span>
						            <span class='float-right'>
						            	<a href='description.php?pro_id=$pro_id' style='margin: 0;cursor: pointer;border:none;background: #1c2a48;border-radius: 10em;' class='btn btn-md white-text' title='Add to Cart'>Add to Cart &nbsp;<i class='fa fa-cart-plus'></i></a>
						            </span>
                				</div>
          					</div>  
         					<br>        
						</div>
							
					";
				}
			}else{
				echo "No results found for " . $q;
			}
		?>
	</div>
</div>

<?php include('includes/footer.php'); ?>