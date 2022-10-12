<?php
  $DB_SERVER    = "localhost";
  $DB_USER    = "root";
  $DB_PASSWORD  = "";
  $DB_NAME    = "project_webdev";

  // create conn obj
  $conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);

  // check
  if (!$conn) {
    die("Connection to database failed");
  }
  else{
    
  }

  
  if(isset($_SESSION['nakaloginBa'])){
    header("Location:index.php");
  }
  session_start();

          if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
          $sname  = $_POST['name'];
          $semail  = $_POST['email'];
          $ssubject  = $_POST['subject'];

          $smessage  = $_POST['message'];
          $sdate = date('Y/m/d H:i:s');
          
            $sql = "INSERT INTO `_feedbacks` (`_id`,`_name`,`_email`,`_subject`,`_message`,`_date`) VALUES ('NULL','$sname','$semail','$ssubject','$smessage','$sdate')";
            if (mysqli_query($conn, $sql)) {
              echo '<script language="javascript">';
              echo 'alert("Successfully added")';
              echo '</script>';
              header("Location:index.php");
            } 
            else {
              echo "Error" . $sql . "<br />" . mysqli_error($conn);
            }
          }

//$_POST['submit'] = null;
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
  
  <script type="text/javascript">
  function aboutuser() {
 
    pangalannguser = document.getElementByID("ufname") = "pangalan mo";
    datipa = document.getElementByID("memsince");

    ufname.innerHTML = "pangalan mo";
    memsince.innerHTML = "noon pa";
  }
  </script>




    <script>
      $(function() {
        $('#glist').easyPaginate({
          paginateElement: 'span',
          elementsPerPage: 6,
          effect: 'slide',//fade,slide,climb
        
          
          
        });
      });
    </script>
    
<!-- search -->


<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>

<!-- #search -->


</head>

<body onload="aboutuser()">
  <!--<div id="preloader"></div>-->
  
<!--==========================
  Hero Section
============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="img/logo.png" alt="Free2Play">
        </div>
        
        <h1>Welcome to Free-to-Play</h1>
        <h2>Where you can <span class="rotating">, relax,play games, enjoy</span></h2>
        <div class="actions">
          <a href="register.php" class="btn-get-started">Sign Up/Login</a>
          <a href="#portfolio" class="btn-services">Our Games</a>
        </div>
      </div>
    </div>
  </section>
  
<!--==========================
  Header Section
============================-->
<div><form>
        <input type="search" size="30" placeholder="Search Items" onkeyup="showResult(this.value)">
        <div id="livesearch"></div>
        </form>
</div>


  <header id="header">
    <div class="container">
    
      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Free2Play</a></h1>-->
      </div>
        
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
<!--           <li><a href="#about">About Us</a></li> -->
          <li><a href="#portfolio">Games</a></li>
<!--           <li><a href="#team">Team</a></li> -->
<!--           <li><a href="#contact">Contact Us</a></li> -->
          <li></li>
          <li><a href="cart.php#hero">Cart</li>
          <li><a href="wishlist.php#hero">Wishlist</li>
          <!--TODO: create js/php condition to show only when has logged in user-->
          <li class="menu-has-children"><a id="ufname" href="">User's name here</a>
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
  About Section
============================-->
  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">About Us</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">We are a group of students who is seeking for fun and excitement, so we come up to making a website that provides all the fun and games we need in order to release our stress and tension in school works.</p>
        </div>
      </div>
    </div>
    <div class="container about-container wow fadeInUp">
      <div class="row">
        <div class="col-md-6 col-md-push-6 about-content">
          <h2 class="about-title">We provide free games for all your needs</h2>
          <p class="about-text">
           Different free games are available for every player to have a choice. You will now not miss up having fun. For every stage or level excitement is waiting.
          </p>
          <p class="about-text">
            We recognize and value your loyalty to our services that we acknoledge you everytime you visit and play with us.
          </p>
          <p class="about-text">
            We collected our favorite games and put it in a website where you can just play them in just a click of a mouse.
          </p>
          <p class="about-text">
            Now without spending huge amount of money we are providing you these games for FREE.
          </p>
        </div>
      </div>
    </div>
  </section>
    
<!--==========================
  Games
============================-->
  <section id="portfolio">
    <div id="glist">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Games</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Here are some of our favorite games that we love to share with you.</p>
        </div>
      </div>
      
      <div id="gamelist">
      </br>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/game-7.jpg);" href="game-7.php">
            <div class="details">
              <h4>Weapons of Math Destruction</h4>
              <span>Click here to play game</span>
            </div>
          </a>
          <span><a href="addtocart.php">Add to Cart</a></span>  | 
          <span><a href="addtowishlist.php">Add to Wishlist</a></span>
        </div>
        
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/game-8.jpg);" href="game-8.php">
            <div class="details">
              <h4>Combots</h4>
              <span>Click here to play game</span>
            </div>
          </a>
          <span><a href="addtocart.php">Add to Cart</a></span>  | 
          <span><a href="addtowishlist.php">Add to Wishlist</a></span>
        </div>

                <a href="index.php#portfolio"><button>Previous Page</button></a>
      </br>
      </div>
    </div>
  </div>
  </section>

<!--==========================
  Team Section
============================-->    
<!--   <section id="team">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Our Team</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">These are the people behind the Free-to-Play website</p>
        </div>
      </div>
  
    </div>
  </section> -->
    
<!--==========================
  Contact Section
============================--> 
  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Contact Us</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Send us feedbacks,comments and suggestions about our games and services.</p>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>Bulacan State University<br>Malolos City, Bulacan 3000</p>
            </div>
            
            <div>
              <i class="fa fa-envelope"></i>
              <p>haha@hehe.hihi</p>
            </div>
            
            <div>
              <i class="fa fa-phone"></i>
              <p>+6398 765 43210</p>
            </div>
            
          </div>
        </div>
        
        <div class="col-md-5 col-md-push-2">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <!--TODO: Insert action here-->
            <form action="index.php" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><input type="submit" class="btn" id="submit" name="submit" value="submit"></div>
            </form>
          </div>
        </div>
        
      </div>
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
  <script src="js/custom.js"></script>

</body>
</html>