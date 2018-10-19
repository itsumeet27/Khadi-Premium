<!DOCTYPE html>
<?php 
  include '../core/init.php';
?>
  <head>
  <title>Admin - Khadi Premium | Treasures of India</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    html,body{
      overflow-x: hidden;
    }
    body{
      font-family: 'Montserrat', sans-serif;
    }
    .container{
      width: 90%;
    }
    .title{
      font-family: 'Berkshire Swash', cursive;
      font-size: 3em;
      text-align: center;
      padding: 1em;
      color: #805a26;
    }
    .title-text{
      font-family: 'Berkshire Swash', cursive;
      font-size: 1.4em;
      text-align: center;
      font-weight: normal;
    }
    .col-lg-4, .col-md-4, .col-md-6, .col-sm-12, .col-xs-12{
      padding: 1.5em;
    }
    .regime h2, .featured h2, .knowledge h2, .testimonials h2{
      font-family: Trajan Pro;
      font-size: 3em;
      text-align: center;
      padding: 1em;
    }
    .beauty-regime{
      line-height: 1.5em;
      padding: 1em;
    }
    .regime-shop{
      color:#fff;
      background-color: #805a26;
      border-radius: 2px;
      border: 1px solid #805a26;
      padding: 1em 1.75em;
    }
    .regime-shop:hover{
      color: #805a26;
      background-color: #fff;     
      transition-duration: 0.4s;
      text-decoration: none;
    }
    .know-title{
      font-family: Trajan Pro;
      font-size: 2.5em;
      text-align: center;
      padding: 0.5em;
    }
    .know-desc{
      text-align: justify;
      padding: 0.5em;
    }
    .know-more{
      text-align: center;
    }
    .know-more a{
      color:#fff;
      background-color: #805a26;
      border-radius: 2px;
      border: 1px solid #805a26;
      padding: 0.75em 1.25em;
    }
    .know-more a:hover{
      color: #805a26;
      background-color: #fff;     
      transition-duration: 0.4s;
      text-decoration: none;
    }
    .know-head{
      font-size: 1.5em;
    }
    .know{
      width: 5em;
      border-style: smooth;
      border-color: #805a26;
      border-width: 0.25em;
      border-radius: 10px;
    }
    .testimonials-head{
      font-size: 2.25em;
      font-family: Trajan Pro;
      text-align: center;
    }
    .testimonials-text{
      font-size:  18px;
      padding: 10em;
      font-family: 'Berkshire Swash', cursive;
      text-align: center;
      line-height: 1.5em;
    }
    .navbar{
      border: none;
    }
    .navbar-inverse{
      background-color: #fff;
    }
    .navbar-inverse .navbar-nav > li > a{
      color: #805a26;
      font-family: Trajan Pro;
      font-size: 1.15em;
    }
    .navbar-inverse .navbar-nav > li > a:hover{
      color: #fff;
      background-color: #805a26;
      transition-duration: 0.4s;
    }
    .products, .blog{
      box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.4);
      padding: 2.5em;
      border-radius: 5px;
    }
    .add-to-cart{
      padding: 0.75em;
    }
    .prod{
      color: #805a26;
    }
    .blog-title{
      text-align: center;
      font-family: Trajan Pro;
      font-weight: bold;
      padding: 0.5em;
    }
    .blog-desc{
      text-align: justify;
    }
    .saved-image{
      width: 200px;
      height: 200px;
    }
    .del-image{
      margin: 1em;
    }
    .saved-image img{
      width: 100%;
    }
  </style>
</head>
<body>
  <div>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <a href="/khadi/admin/index.php"><img src="../images/download.png" class="img-responsive"></a>
        </div>
        <div class="col-lg-0- col-md-0">
          <center><a href="#">My Account</a> | <a href="#">Login</a></center>
        </div>
    </div>
  </div>
  <br>
  <!--Navigation Bar-->
  <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                  <li><a href="categories.php">Categories</a></li>
                  <li><a href="products.php">Products</a></li>
                  <li><a href="blog.php">Blog</a></li>
              </ul>
            </div>
        </nav>