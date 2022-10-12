<?php


  // echo "Successfully Logged out. You will be redirected in 3 secs...";
  // echo "$_SESSION[userNaNakalogin]";
  header("refresh:10,url=index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Free-to-Play</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
    
  
  
  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="img/favicon.png" rel="shortcut icon">
  
  
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/game.css" rel="stylesheet">
  
</head>

<body>
<?php
session_start();
$_SESSION['nam']="Legends Crusade";
  ?>
  <!--<div id="preloader"></div>-->

<!--==========================
  Header Section
============================-->
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Home</a></li>
          <li class="menu-has-children menu-active"><a href="">Games</a>
            <ul>
              
              <li><a href="game-1.php">Color Ball</a></li>
              <li><a href="game-2.php">Bunny Flags</a></li>
              <li><a href="game-3.php">Learn to Fly</a></li>
              <li class="menu-active"><a href="#hero">Legends Crusade</a></li>
              <li><a href="game-5.php">Carnage</a></li>
              <li><a href="game-6.php">Kingdom Keeper</a></li>
              <li><a href="game-7.php">Weapons of Math Destruction</a></li>
              <li><a href="game-8.php">Combots</a></li>
            </ul>
          </li>
          <li><a href="cart.php">Cart</li>
          <!--TODO: create js/php condition to show only when has logged in user-->
          <li class="menu-has-children"><a href="">User's name here</a>
            <ul>
              <li><a id="memsince" href="#">Some details: some value</a></li>
              <!--TODO: create js/php function for logging out-->
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  
<!--==========================
  Hero Section
============================-->
  <section id="hero">
    <div class="hero-container">
        <embed class="game" src="swf/game-4.swf" type="" height="100%" width="100%">
    </div>
    <div>
      <a href="addtocart.php"><button>To Cart</button>
    </div>
    <div>
      <a href="addtowishlist.php"><button>To Wishlist</button>
    </div>
  </section>
  
<!--==========================
  Footer
============================--> 
  <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright">
              &copy; Project in <strong>IT 373: </strong> ADVANCE WEB APPLICATION
            </div>
            <div class="credits">
              
            </div>
          </div>
        </div>
      </div>
  </footer><!-- #footer -->
  
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    
  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>
  
  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/non-sticky.js"></script>

</body>
</html>