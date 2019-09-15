<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <meta name="google-signin-client_id" content="192676492612-0rl9d9o38fq8aaa1tcd6pd1meopmhqb4.apps.googleusercontent.com">
      <link rel="shortcut icon" type="../image/x-icon" href="/khadi/img/logo.ico" />
      <title>Khadi Premium Cosmetics | Treasures of India</title>  
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Montserrat|Poppins" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">

    <link href="../css/datatables.css" rel="stylesheet">

    <link href="../css/datatables.min.css" rel="stylesheet">
    <style type="text/css">
        .top-nav-collapse {
          background-color: #6b5523;
        }
        @media (max-width: 768px) {
          .navbar:not(.top-nav-collapse) {
            background-color: #6b5523;
          }
        }
        @media (min-width: 800px) and (max-width: 850px) {
          .navbar:not(.top-nav-collapse) {
            background-color: #6b5523;
          }
    </style>
</head>

<body class="grey lighten-3">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar z-depth-0">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="index.php">Khadi Premium Cosmetics</a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="categories.php">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="users.php">Users</a>
                        </li>
                        <?php 
                          if(!isset($_SESSION['email'])){
                            
                          }
                          else{
                            echo "<li class='nav-item'><a href='logout.php' class='nav-link' style='border-radius: 10em;'>Logout</a></li>";
                          }
                        ?>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/khadipremium" class="nav-link waves-effect">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://instagram.com/khadipremium" class="nav-link waves-effect">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->