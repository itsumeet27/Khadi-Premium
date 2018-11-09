<?php 
  include('includes/header.php');
  require_once 'core/init.php';
  include('includes/functions.php');
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
</style>

	<!--Mask-->
    <div id="about" class="view" style="height: 50%;background: url('img/2054.jpg')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
      <div class="mask rgba-black-strong">
        <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          <div class="row d-flex justify-content-center text-center">
            <div class="">
              <!-- Heading -->
              <a href=""><h1 class="white-text h1-responsive">Bath and Beauty Products</h1></a>
              <button type="button" class="btn btn-outline-white">Browse Now<i class="fa fa-shopping-cart ml-2"></i></button>
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
      <div class="sidebar-nav" style="background: none;">
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse" style="background: #fff;cursor: pointer;border: none;border-radius: 5px;padding: 0.5em 0.75em">
              <i class="fa fa-reorder" aria-hidden="true"></i>
            </button>
            <span class="visible-xs navbar-brand">&nbsp;<b>Categories</b></span>
          </div>
          <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav" style="text-align: left;">
            <li style="padding: 7.5px;"><a href="bath-and-beauty.php">All Products</a></li>
            <?php getBath_BeautyCare(); ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="row">
        <?php getBath_BeautyPro(); ?>
        <?php getCatBath_BeautyPro(); ?> 
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