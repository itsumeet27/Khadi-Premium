<!DOCTYPE html>
<?php include 'core/init.php';?>
<?php include 'includes/functions.php';?>
<html lang="en" style="overflow-x: hidden;">
<head>
  <meta name="google-signin-client_id" content="192676492612-0rl9d9o38fq8aaa1tcd6pd1meopmhqb4.apps.googleusercontent.com">
  <link rel="shortcut icon" type="image/x-icon" href="/khadi/img/logo.ico" />
  <title>Khadi Premium Cosmetics | Treasures of India</title>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Montserrat|Poppins" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="styles/style.css">
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <script src="js/jquery-3.4.1.min.js"></script>

  <link  href="css/fotorama.css" rel="stylesheet"> <!-- 3 KB -->

  <script src="js/fotorama.js"></script> <!-- 16 KB -->

  <style type="text/css">
    .top-nav-collapse {
      background-color: #6b5523;
    }
    @media (max-width: 768px) {
      .navbar:not(.top-nav-collapse) {
        background-color: #6b552369;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background-color: #6b552369;
      }
    }

    .img-container {
      position: relative;
      width: 50%;
    }

    img.image {
      display: block;
      width: 100%;
      height: auto;
    }

    .image-overlay{
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      height: 100%;
      width: 100%;
      opacity: 0;
      transition: .5s ease;
      background-color: #0a0a0a99;
    }

    .img-container:hover .image-overlay{
      opacity: 1;
    }

    .text {
      color: white;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      text-align: center;
    }

    hr.head-line{
      width: 75px;text-align: center;color: #333;background-color: #333;margin-bottom: 3em;border-width: 2px;border-radius:50px
    }

  </style>
</head>
<body style="background: #f9f9f9">
  <script type="text/javascript">
    function active(){
      var searchBar = document.getElementById('searchBar');
    }
  </script>

  <!-- Start your project here-->
  <!--Main Navigation-->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar z-depth-0">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="index.php">Khadi Premium Cosmetics</a>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="basicExampleNav">
        <!-- Links -->
        <ul class="navbar-nav mr-auto smooth-scroll">
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="products.php" role="button" aria-haspopup="true"
              aria-expanded="false">Products</a>
            <div class="dropdown-menu" style="padding: 0;margin: 0;margin-top: 0.35em;">
              <div class="row" style="width: 320px">
                <div class="col-md-6">
                  <a class="dropdown-item" href="products.php">All Products</a>
                  <a class="dropdown-item" href="skin-care.php">Skin Care</a>
                  <a class="dropdown-item" href="hair-care.php">Hair Care</a>
                  <a class="dropdown-item" href="body-care.php">Body Care</a>
                </div>
                <div class="col-md-6">
                  <a class="dropdown-item" href="beauty-regime.php">Beauty Regime</a>
                  <a class="dropdown-item" href="packages.php">Packages</a>
                </div>   
              </div>                         
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart <i class="fas fa-shopping-cart"></i></a>
          </li>
            <?php 
              if(!isset($_SESSION['email'])){
                echo "<li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>My Account</a></li>";
              }
              else{
                echo "<li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>My Account</a></li>";
                echo "<li class='nav-item'><a href='logout.php' class='nav-link' style='border-radius: 10em;'>Logout</a></li>";
              }
            ?>
          <!-- <li><div class="g-signin2" data-onsuccess="onSignIn"></div></li> -->
        </ul>
        <nav class="navbar navbar-dark z-depth-0">
          <form class="form-inline" id="searchForm" action="search.php" method="GET">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" name="q" type="text" placeholder="Search Products" aria-label="Search" id="searchBar" value="">
            </div>
            <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit"><i class="fa fa-search"></i></button> 
          </form>          
        </nav>
        <!-- Links -->

        <!-- Social Icon  -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link" href="https://facebook.com/khadipremium"><i class="fab fa-facebook-f"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://instagram.com/khadipremium"><i class="fab fa-instagram"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""><i class="fab fa-youtube"></i></a>
          </li>
          
          
        </ul>
        <!-- Collapsible content -->

      </div>

    </nav>
  <!--Main Navigation-->