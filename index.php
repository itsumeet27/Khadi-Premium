<?php 
  session_start();
  include('includes/header.php');
  include('core/init.php');

?>

<?php 
  $sql = "SELECT * FROM products WHERE featured = 1 AND deleted = 0 AND beauty_regime = 0";
  $products = $db->query($sql);

  $blogsql = "SELECT * FROM blog WHERE deleted = 0";
  $blogs = $db->query($blogsql);
?>

<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="images/rose-water-bar-banner.jpeg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <a href="./description.php?pro_id=57.php" class="btn btn-outline-white">Shop Now<i class="fa fa-shopping-cart ml-2"></i></a>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/deep-nourishing-shampoo-banner.jpeg"
          alt="Second slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <a href="./description.php?pro_id=36.php" class="btn btn-outline-white">Shop Now<i class="fa fa-shopping-cart ml-2"></i></a>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/chamomile-night-cream-banner.jpeg"
          alt="Third slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <a href="./description.php?pro_id=27.php" class="btn btn-outline-white">Shop Now<i class="fa fa-shopping-cart ml-2"></i></a>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

<!-- <div id="about" class="view" style="height: 50%;background: url('img/ban.JPG')no-repeat center center fixed;
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
          <h4 class="white-text my-4 h1-responsive" style="font-family: 'Cookie', cursive;">Treasures of India</h4>
          <a href="products.php" class="btn btn-outline-white">Shop Now<i class="fa fa-shopping-cart ml-2"></i></a>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!--/.Navbar-->
</header>
<!--Main Navigation-->
<main>

  <div class="row p-4" style="background: #fff;">
    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
      <div class="banner-img">
        <img src="images/hair control and body nourishment.jpg" />
      </div>
    </div>
    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
      <div class="banner-text p-3" style="vertical-align: middle;">
        <h1 class="text-center" style="font-family: 'Righteous', cursive;line-height: 1.6em; color: #805a26;">Complete Hair, Body and Facial Nourishment Package - Set Of 4 (Shampoo, Conditioner, Face Wash and Body Wash)</h1>
      </div>
      <div class="description text-justify p-3">
        <p class="lead" style="line-height: 1.5em;">
          <b>Body Wash</b>:-Possesses great anti-oxidant and antiseptic properties. Great for detoxifying the body and boosting immunity. Also strengthen skin tissues and heals pores. 
        </p>
        <p class="lead" style="line-height: 1.5em;">
          <b>Face Wash</b>:-Perfect anti-aging face wash with very effective astringent properties. Quickly results in a lively looking skin with reduces blemishes.
        </p>
      </div>
      <div class="shop-btn text-center p-3">
        <a class="btn btn-white btn-outline-black" href="#">PURCHASE NOW <i class="fa fa-shopping-cart left"></i></a>
      </div>
    </div>
  </div>

  <!-- Quote -->
  <div style="padding: 5em 0em;background: url('images/ban2-new.jpg');background-size: cover;background-attachment: fixed;background-repeat: no-repeat;background-position: center center; color: #fff;">
    <h1 class="title h1-responsive" style="font-family: 'Berkshire Swash', cursive;text-align: center;">
      If Good Skin is Treasure, Nature is the Key!
    </h1>
    <h5 class="title-text h5-responsive" style="padding: 1em; line-height: 1.6em; text-align: center;font-family: 'Berkshire Swash', cursive;">
      India's greatest potential lies in the age-old medicinal and transformational herbs that spring off the deeply rich earth of this country. Some with properties so effective, they're seen in scriptures as almost mystical or magical. By complimenting the magic of Indian ingredients with exotic essential oils, we at Khadi Premium proud ourselves for creating the perfect mix of products for your Hair, Skin and Body.
    </h5>
    <h1 class="title h1-responsive" style="font-family: 'Berkshire Swash', cursive;text-align: center">
      So go ahead, Discover these Treasures for Yourself!
    </h1>
  </div>

  <!-- Packages -->

  <section style="padding: 4em 0;background: #fff;">
    <h1 class="h1-responsive font-weight-bold text-center pt-4 pb-3" style="text-transform: uppercase;">Our Packages</h1>
    <hr class="head-line">
    <div class="row p-4">
      <div class="col-md-6 col-sm-12 col-xs-12 img-container p-4">
        <img src="images/anti acne treatment.jpg" class="image" />
        <div class="image-overlay">
          <div class="text-center text">
            <h2 class="p-3">Anti Acne Treatment Package</h2>
            <a href="#" class="btn btn-white">Purcahse Now <i class="fa fa-shopping-cart left"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12 img-container p-4">
        <img src="images/hair and skin protection.jpg" class="image" />
        <div class="image-overlay">
          <div class="text-center text">
            <h2 class="p-3">Hair and Skin Protection</h2>
            <a href="#" class="btn btn-white">Purcahse Now <i class="fa fa-shopping-cart left"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <div class="shop-btn text-center p-3">
        <a class="btn btn-white btn-outline-black" href="#">BROWSE MORE <i class="fa fa-shopping-cart left"></i></a>
      </div>
    </div>
  </section>

  <!-- Best Sellers -->
  <div style="background: #e5e5c482;">
    <div class="container-fluid">
      <!-- Section: Products v.5 -->
      <section class="text-center" style="padding: 4em 0em">

        <!-- Section heading -->
        <h1 class="h1-responsive font-weight-bold text-center pt-4 pb-3" style="text-transform: uppercase;">Our bestsellers</h1>
        <hr class="head-line">
        <!-- Section description -->
        <!-- <p class="grey-text text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur
          adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas
        nostrum quisquam eum porro a pariatur veniam.</p> -->

        <div class="row">   
          <?php while($product = mysqli_fetch_assoc($products)): ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-lg-0 mb-4">    
            <div class="card card-cascade wider card-ecommerce">
              <div class="view zoom view-cascade overlay">
                <?php $photos = explode(',',$product['image']); ?>
                <img src="<?= $photos[0]; ?>" class="card-img-top img-fluid" alt="<?= $product['title']; ?>">
                <button onclick="detailsmodal(<?= $product['id']; ?>)" style="background: none;border: none;cursor: pointer"><div class="mask rgba-white-slight"></div></button>
              </div>
              <div class="card-body card-body-cascade text-center">
                    <h5>
                        <strong>
                          <button onclick="detailsmodal(<?= $product['id']; ?>)" style="background: none;border: none;cursor: pointer;padding-bottom: 1em;"><b><?=$product['title'];?></b></button>
                        </strong>
                    </h5>
                    <h6 class=""><?=$product['short_desc'];?></h6>
                </div>

                <div class="card-footer px-1 px-3 py-3" style='background: #f1e1b3'>
                      <span class="float-left font-weight-bold">
                          <strong><?=$product['weight']; ?></strong>
                      </span>
                      <span class="float-right">
                        <a href="description.php?pro_id=<?= $product['id']; ?>" style="margin: 0;cursor: pointer;border:none;border-radius: 10em;background: #6b5523;color: #fff" class="btn btn-md" title="Add to Product">View Product</a>
                      </span>
                      
                </div>
            </div>  
            <br>        
          </div>
          <?php endwhile;?> 

        </div>
      </section>
      <!-- Section: Products v.5 -->
    </div>
  </div>

  <!-- Blogs -->
  <div class="container-fluid" style="background: #fff">
    <section class="text-center" style="padding: 4em 0em">
      <!-- Section heading -->
      <h1 class="h1-responsive font-weight-bold text-center pt-4 pb-3" style="text-transform: uppercase;">Our Blogs</h1>
      <hr class="head-line">
      <!-- Section content -->
      <div class="row">
        <?php while($blog = mysqli_fetch_assoc($blogs)): ?>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="blog px-3 py-3" style="box-shadow: 0px 4px 10px 0px rgba(0,0,0,0.5); border-radius: 10px;background: #fff">
              <div class="blog-img">
                <?php $photos = explode(',',$blog['image']); ?>
                <a href="posts.php?blog_id=<?=$blog['id'];?>"><img src="<?= $photos[0]; ?>" class="img-fluid" alt="<?= $blog['title']; ?>"></a>
              </div>
              <div class="blog-title pt-3">
                <a href="posts.php?blog_id=<?=$blog['id'];?>"><h4 class="text-center px-2 py-2" style="color: #1c2a48"><b><?=$blog['title']; ?></b></h4></a>
              </div>
              <div class="blog-desc">
                <h6 class="text-center px-2 py-2"><b><?=$blog['author']; ?> | <?= $blog['date']; ?></b></h6>
                <p style="text-align: justify;">        
                <?=nl2br($blog['short_desc']); ?>     
                  <a href="posts.php?blog_id=<?=$blog['id'];?>">Read More</a>
                </p>
              </div>
            </div>
            <br>
          </div>
        <?php endwhile; ?>
      </div>
    </section>
  </div>

  <!-- Section: Testimonials v.2 -->
  <section class="text-center my-5">

    <!-- Section heading -->
    <h1 class="h1-responsive font-weight-bold text-center pt-4 pb-3" style="text-transform: uppercase;">Testimonials</h1>
      <hr class="head-line">

    <!-- Carousel Wrapper -->
    <div id="carousel-example-1" class="p-3 carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel"
    data-interval="false">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active">
        <div class="testimonial">
          
          <!--Content-->
          <p>
            <i class="fa fa-quote-left"></i> I love the regular Khadi products as well, but there is a definite premium feel and quality to the Khadi Premium range which I think is ideal for consumers. The chocolate face mask and soaps so far are my favourite, I love the body wash & body lotion too, it's definitely top notch quality for skin care and price point wise is perfect. The Khadi premium shampoo range is definitely a class above than the regular ones, regular shampoos would leave a dry sensation in my hair but the premium range does not.
          </p>
          <h4 class="font-weight-bold">Megha Anand</h4>
          <!-- <h6 class="font-weight-bold my-3">Photographer at Studio LA</h6> -->
          <!--Review-->
          <i class="fa fa-star red-text"> </i>
          <i class="fa fa-star red-text"> </i>
          <i class="fa fa-star red-text"> </i>
          <i class="fa fa-star red-text"> </i>
          <i class="fa fa-star-half-full red-text"> </i>
        </div>
      </div>
      <!--First slide-->
      <!--Second slide-->
      <div class="carousel-item">
        <div class="testimonial">
          
          <!--Content-->
          <p>
            <i class="fa fa-quote-left"></i> I have used a their face product solutions, namely the face wash, scrub and mask. What I really like about their products is that they are made of natural ingredients. They are really mild on the skin, which makes it super soft and supple post usage and makes me feel good. Been using them regularly and have seen positive results on my skin. Blemishes have faded with the help of the mask I am using. I am in love with their products and totally recommend using Khadi Premium </p>
            <h4 class="font-weight-bold">Venu Joshi</h4>
            <!-- <h6 class="font-weight-bold my-3">Photographer at Studio LA</h6> -->
            <!--Review-->
            <i class="fa fa-star red-text"> </i>
            <i class="fa fa-star red-text"> </i>
            <i class="fa fa-star red-text"> </i>
            <i class="fa fa-star red-text"> </i>
            <i class="fa fa-star red-text"> </i>
          </div>
        </div>
        <!--Second slide-->
        <!--Third slide-->
        <div class="carousel-item">
          <div class="testimonial">
            
            <!--Content-->
            <p>
              <i class="fa fa-quote-left"></i> The environment friendly Khadi Premium product range is a traditional breath of fresh air in a highly competitive cosmetic market. A unique combination of natural exotic ingredients and essential oils, this is just the kind of products I was looking for to enhance my wellness regimen. I love their chocolate face mask, which makes my skin radiate with energy and gives me a fresh look. After using the mask and before stepping out I make sure to us their face mist as well for an even better result. </p>
              <h4 class="font-weight-bold">Megha Arora</h4>
              <!-- <h6 class="font-weight-bold my-3">Front-end Developer in NY</h6> -->
              <!--Review-->
              <i class="fa fa-star red-text"> </i>
              <i class="fa fa-star red-text"> </i>
              <i class="fa fa-star red-text"> </i>
              <i class="fa fa-star red-text"> </i>
              <i class="fa fa-star-o red-text"> </i>
            </div>
          </div>
          <!--Third slide-->
        </div>
        <!--Slides-->
        <!--Controls-->
        <a class="carousel-item-prev left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
          <span class="icon-prev" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-item-next right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
          <span class="icon-next" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        <!--Controls-->
      </div>
      <!-- Carousel Wrapper -->

    </section>
    <!-- Section: Testimonials v.2 -->
  </div>
</div>

</main>
<?php include('includes/footer.php');?>
