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
          <li><a href="index.php#games">Games</a></li>
          <li><a href="#">Cart</li>
          <li><a href="Wishlist.php">Wishlist</a></li>
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
      <?php   
        $xml= new DomDocument;
        $xml->Load('cart.xml');
        $x=$xml->getElementsByTagName('product')->item(0);//root
        $stud=$x->getElementsByTagName('products');//children
        session_start();
        $user=$_SESSION['user'];
        $exist=0;
        $found=0;
        if($stud->length==0){
              echo "Cart Empty";
          }
          else{
        foreach($stud as $newstud){
            if($newstud->getElementsByTagName("user")->item(0)->nodeValue==$user){
                $name=$newstud->getElementsByTagName("title")->item(0)->nodeValue;
                echo $name;
                echo "<a href='cartdelete.php?rem=$name'>Remove this from cart</a>";
                $found=1;
                echo '<br>';
            }        
          }
        }
      ?>
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