<?php 
  include('includes/header.php');
  require_once 'core/init.php';
?>

<style type="text/css">
  @media (max-width: 991px) {

    .sidebar-nav .navbar .navbar-collapse {
      padding: 0;
      max-height: none;
    }
    .sidebar-nav .navbar ul {
      float: none;
      display: block;
    }
    .sidebar-nav .navbar li {
      float: none;
      display: block;
    }
    .sidebar-nav .navbar li a {
      padding-top: 7.5px;
      padding-bottom: 7.5px;
      color: #fff;
    }
  }

  .bc-icons-2 .breadcrumb-item + .breadcrumb-item::before {
    content: none; 
  }
  .bc-icons-2 .breadcrumb-item.active {
    color: #455a64; 
  }
</style>

  <!--Mask-->
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
              <h4 class="white-text my-4 h1-responsive" style="font-family: 'Cookie', cursive;">Our Beauty Regime</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/.Mask-->
    <!-- Section: Products v.3 -->
<section class="text-center my-5">
<div class="container-fluid">
  <div class="row">   
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="sidebar-nav" style="background: #6b5523;">
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse" style="background: #fff;cursor: pointer;border: none;border-radius: 5px;padding: 0.5em 0.75em">
              <i class="fa fa-reorder" aria-hidden="true"></i>
            </button>
            <span class="visible-xs navbar-brand">&nbsp;<b class="text-white">Categories</b></span>
          </div>
          <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav" style="text-align: left;">
            <li style="padding: 7.5px;"><a href="beauty-regime.php" class="text-white">All Products</a></li>
            <?php getBeautyCare(); ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="row">
        <?php getBeautyPro(); ?>
        <?php getCatBeautyPro(); ?> 
      </div>
    </div>
  </div>
</div>
</section>
<!-- Section: Products v.3 -->
<script type="text/javascript">
    function detailsmodal(id){
      var data = {"id" : id};
      jQuery.ajax({
        url : '/khadi/includes/modal.php',
        method : "post",
        data : data,
        success: function(data){
          jQuery('body').append(data);
          jQuery('#details-modal').modal('toggle');
        },
        error: function(){
          alert("Something went wrong!");
        }
      })
    }
  </script>

<?php include('includes/footer.php');?>