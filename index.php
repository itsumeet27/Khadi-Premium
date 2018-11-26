<?php 
  session_start();
  include('includes/header.php');
  include('core/init.php');

?>

<?php 
  $sql = "SELECT * FROM products WHERE featured = 1 AND deleted = 0 AND beauty_regime = 0";
  $products = $db->query($sql);
?>

<!--Mask-->
<div id="intro" class="view">
  <div class="mask rgba-black-strong">
    <div class="container-fluid d-flex align-items-center justify-content-center h-100">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-md-10">
          <!-- Heading -->
          <a href=""><img src="img/Logo.png" class="img-fluid" style="width: 400px;"></a>
          <!-- Divider -->
          <hr class="hr-light">
          <!-- Description -->
          <h4 class="white-text my-4 h1-responsive" style="font-family: 'Cookie', cursive;">Treasures of India</h4>
          <a href="products.php" class="btn btn-outline-white">Shop Now<i class="fa fa-shopping-cart ml-2"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/.Mask-->

<!--/.Navbar-->
</header>
<!--Main Navigation-->
<main>
  
  <!-- Quote -->
  <div class="" style="padding: 5em 0em;">
    <h1 class="title h1-responsive" style="font-family: 'Berkshire Swash', cursive; color: #805a26;text-align: center">
      If Good Skin is Treasure, Nature is the Key!
    </h1>
    <h5 class="title-text h5-responsive" style="padding: 1em; line-height: 1.6em; text-align: center;font-family: 'Berkshire Swash', cursive;">
      India's greatest potential lies in the age-old medicinal and transformational herbs that spring off the deeply rich earth of this country. Some with properties so effective, they're seen in scriptures as almost mystical or magical. By complimenting the magic of Indian ingredients with exotic essential oils, we at Khadi Premium proud ourselves for creating the perfect mix of products for your Hair, Skin and Body.
    </h5>
    <h1 class="title h1-responsive" style="font-family: 'Berkshire Swash', cursive; color: #805a26;text-align: center">
      So go ahead, Discover these Treasures for Yourself!
    </h1>
  </div>

  <!-- Natural Protection from Sun and Pollution regime -->
  <div class="parallax" style="background-image: url('img/6169.jpg');
  height: 100%;
  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 15em 2.5em;">
  <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
    <div>
      <h5 class="teal-text"><!-- i class="fa fa-pie-chart"></i> --></h5>
      <h3 class="card-title pt-2"><strong>Natural Protection from Sun and Pollution Regime</strong></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
        optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
      Odit sed qui, dolorum!.</p>
      <a class="btn btn-white" href="beauty-regime.php?cat=21">Browse Products <i class="fa fa-shopping-cart left"></i></a>
    </div>
  </div>
</div>

<!-- Best Sellers -->
<div style="background: #e5e5c482;">
  <div class="container-fluid">
    <!-- Section: Products v.5 -->
    <section class="text-center" style="padding: 4em 0em">

      <!-- Section heading -->
      <h2 class="h1-responsive font-weight-bold text-center py-5">Our bestsellers</h2>
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

              <div class="card-footer px-1 px-3 py-3">
                    <span class="float-left font-weight-bold">
                        <strong><?=$product['weight']; ?></strong>
                    </span>
                    <span class="float-right">
                      <a href="description.php?pro_id=<?= $product['id']; ?>" style="margin: 0;cursor: pointer;border:none;border-radius: 10em;background: #1c2a48;color: #fff" class="btn btn-md" title="Add to Product">View Product</a>
                      <!-- <a href="index.php?add_cart=<?=$product['id'];?>" style="margin: 0;cursor: pointer;border:none;background: #1c2a48;border-radius: 10em;" class="btn btn-md white-text" title="View Product">Add to Cart &nbsp;<i class="fa fa-cart-plus"></i></a> -->
                        <!-- <a class="" data-toggle="tooltip" data-placement="top" title="View Product">
                          <i class="fa fa-eye grey-text ml-3"></i>
                        </a> -->
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

<!-- Natural Advanced Night Repair Regime -->
<div class="parallax" style="background-image: url('img/2054.jpg');
height: 100%;
/* Create the parallax scrolling effect */
background-attachment: fixed;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
padding: 15em 2.5em;">
<div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
  <div>
    <h5 class="teal-text"><!-- i class="fa fa-pie-chart"></i> --></h5>
    <h3 class="card-title pt-2"><strong>Natural Advanced Night Repair Regime</strong></h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
      optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
    Odit sed qui, dolorum!.</p>
    <a class="btn btn-white" href="beauty-regime.php?cat=22">Browse Products <i class="fa fa-shopping-cart left"></i></a>
  </div>
</div>
</div>
<div class="container">
  <!-- Section: Testimonials v.2 -->
  <section class="text-center my-5">

    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold my-5">Testimonials</h2>

    <!-- Carousel Wrapper -->
    <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel"
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
          <i class="fa fa-star blue-text"> </i>
          <i class="fa fa-star blue-text"> </i>
          <i class="fa fa-star blue-text"> </i>
          <i class="fa fa-star blue-text"> </i>
          <i class="fa fa-star-half-full blue-text"> </i>
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
            <i class="fa fa-star blue-text"> </i>
            <i class="fa fa-star blue-text"> </i>
            <i class="fa fa-star blue-text"> </i>
            <i class="fa fa-star blue-text"> </i>
            <i class="fa fa-star blue-text"> </i>
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
              <i class="fa fa-star blue-text"> </i>
              <i class="fa fa-star blue-text"> </i>
              <i class="fa fa-star blue-text"> </i>
              <i class="fa fa-star blue-text"> </i>
              <i class="fa fa-star-o blue-text"> </i>
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

  <!-- Natural Nourishment for Hair and Body Regime -->
  <div class="parallax" style="background-image: url('img/5511.jpg');
  height: 100%;
  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 15em 2.5em;">
  <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
    <div>
      <h5 class="teal-text"><!-- i class="fa fa-pie-chart"></i> --></h5>
      <h3 class="card-title pt-2"><strong>Natural Nourishment for Hair and Body Regime</strong></h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
        optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
      Odit sed qui, dolorum!.</p>
      <a class="btn btn-white" href="beauty-regime.php?cat=23">Browse Products <i class="fa fa-shopping-cart left"></i></a>
    </div>
  </div>
</div>

<!--Section: Contact-->
<section style="padding: 4em 0em;background: rgba(205, 220, 57, 0.1);" id="contact">

  <section class="container-fluid">

    <!-- Heading -->
    <h2 class="mb-5 font-weight-bold text-center py-3">Contact us</h2>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-5 col-md-12">
        <div class="card">
          <div class="card-header white-text text-center py-3" style="background: #548990;position: absolute;width: 90%;margin-left: 5%;box-shadow: 0px 3px 7px 0px rgba(0,0,0,0.5);margin-top: -2em; border-radius: 5px;">
            <h4 class="h4-responsive text-center">Leave a message</h4>
          </div>
          <!-- Form contact -->
          <form class="p-5 grey-text" method="post" action="email.php">
            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
              <input type="text" id="form3" class="form-control form-control-sm" name="name">
              <label for="form3">Your name</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
              <input type="text" id="form2" class="form-control form-control-sm" name="email">
              <label for="form2">Your email</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
              <input type="text" id="form32" class="form-control form-control-sm" name="subject">
              <label for="form34">Subject</label>
            </div>
            <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
              <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" rows="4" name="message"></textarea>
              <label for="form8">Your message</label>
            </div>
            <div class="text-center mt-4">
              <button class="btn" type="submit" name="submit" style="background: #607d8b">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
          </form>
          <!-- Form contact -->
        </div>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-7 col-md-12">

        <!--Google map-->
        <!--Grid row-->
        <div class="row text-center">

          <!--Grid column-->
          <div class="col-lg-4 col-md-12 mb-3">

            <p><i class="fa fa-map fa-1x mr-2 grey-text"></i>Adarsh Nagar, Mumbai-400102</p>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-3">

            <p><i class="fa fa-building fa-1x mr-2 grey-text"></i>Mon - Sat, 11:00-18:00</p>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-3">

            <p><i class="fa fa-phone fa-1x mr-2 grey-text"></i>+ 91 9619531115</p>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->
        <div id="map-container" class="z-depth-1-half map-container mb-5" style="height: 400px"></div>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </section>

</section>
<!--Section: Contact-->
<div class="container">
  
</div>
</main>
<?php include('includes/footer.php');?>
