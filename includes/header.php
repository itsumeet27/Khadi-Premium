<!DOCTYPE html>
<?php 
  include 'core/init.php';
  include 'includes/functions.php';
?>

<html lang="en" style="overflow-x: hidden;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <link rel="icon" type="icon/png" href="img/logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Montserrat|Poppins" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="styles/style.css">
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <link  href="css/fotorama.css" rel="stylesheet"> <!-- 3 KB -->

  <script src="js/fotorama.js"></script> <!-- 16 KB -->

  <style type="text/css">
    .top-nav-collapse {
      background-color: #3b465e;
    }
    @media (max-width: 768px) {
      .navbar:not(.top-nav-collapse) {
        background-color: #3b465e;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background-color: #3b465e;
      }
  </style>

</head>

<body style="background: #e8f0ff;font-family: 'Poppins', 'sans-serif'">
  <!-- <div class="container">
    <?php 
      if(isset($_SESSION['email'])){
        echo "<div class='text-center p-3'><b>Welcome: </b>" . $_SESSION['email'] . "</div>";
      }
      else{
        echo "<div class='text-center p-3'>Welcome Guest</div>";
      }
    ?>
  </div> -->
  <!-- Start your project here-->
  <!--Main Navigation-->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar z-depth-0" style="font-family: Roboto;font-weight: 400;">
      <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="index.php">Khadipremium</a>
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
          <li class="nav-item">
            <a class="nav-link" href="skin-care.php">Skin Care</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="hair-care.php">Hair Care</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="body-care.php">Body Care</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bath-and-beauty.php">Bath & Beauty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
          </li>
          <li class="nav-item">
            <?php 
              if(!isset($_SESSION['email'])){
                echo "<a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>My Account</a>";
              }
              else{
                echo "<a href='logout.php' class='nav-link' style='border-radius: 10em;'>Logout</a>";
              }
            ?>
          </li>
        </ul>
        <!-- Links -->

        <!-- Social Icon  -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link" href="https://facebook.com/khadipremium""><i class="fa fa-facebook"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://instagram.com/khadipremium"><i class="fa fa-instagram"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""><i class="fa fa-youtube"></i></a>
          </li>
          
        </ul>
        <!-- Collapsible content -->
      </div>

    </nav>
  <!--Main Navigation-->
