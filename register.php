<?php

  error_reporting(0);
	$DB_SERVER 		= "localhost";
	$DB_USER 		= "root";
	$DB_PASSWORD	= "";
	$DB_NAME		= "project_webdev";

	// create conn obj
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, $DB_NAME);

	// check
	if (!$conn) {
		die("Connection to database failed");
	}
  else{
    
  }

  session_start(); 
  if(isset($_SESSION['nakaloginBa'])){
    header("Location:index.php");

  }



  
    $meth = $_POST['submit'];
  


  switch ($meth) {
     case 'login':{
      if (isset($_POST['form-susername']) && isset($_POST['form-spassword'])) {
          $luname   = $_POST['form-susername'];
          $_SESSION['user']=$luname;
          $lpword   = $_POST['form-spassword'];
          
          $lastlog = date('Y/m/d H:i:s');
          // check existing
          $sql      = "SELECT * FROM `_users` WHERE `_username` = '$luname' AND `_password` = '$lpword'";
          $result     = mysqli_query($conn, $sql);
          $bilangNgRow  = mysqli_num_rows($result);


          if ($bilangNgRow > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nakaloginBa'] = true;
            $_SESSION['userNaNakalogin'] = $row['_fname'];

            $sql = "UPDATE `_users` SET `_last_login`= '$lastlog' WHERE `_username` = '$luname'";
            $result     = mysqli_query($conn, $sql);
            header("refresh:3,url=index.php");

          } 
          else{
            echo '<script language="javascript">';
            echo 'alert("account not found")';
            echo '</script>';
          }

        }
      break;
    }
    case 'register':{
      if (isset($_POST['form-username']) && isset($_POST['form-password']) && isset($_POST['form-email']) && isset($_POST['form-first-name']) && isset($_POST['form-last-name']) && isset($_POST['form-age'])) {
          $uname  = $_POST['form-username'];
          $pword  = $_POST['form-password'];
          $email  = $_POST['form-email'];

          $fname  = $_POST['form-first-name'];
          $lname  = $_POST['form-last-name'];
          $age  = $_POST['form-age'];
          
          $regdate = date('Y/m/d H:i:s');
          // check existing
          $sql      = "SELECT * FROM `_users` WHERE `_username` = '$uname'";
          $result     = mysqli_query($conn, $sql);
          $bilangNgRow  = mysqli_num_rows($result);

          if ($bilangNgRow > 0) {
            echo '<script language="javascript">';
            echo 'alert("already exist")';
            echo '</script>';
          } 
          else {
            $sql = "INSERT INTO `_users` (`_id`,`_username`,`_password`,`_email`,`_fname`,`_lname`,`_age`,`_regdate`) VALUES ('NULL','$uname','$pword','$email','$fname','$lname','$age','$regdate')";
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
    }

    
      
      break;
    }
   
    default:
      
      break;
  }

if(isset($_POST['Submit'])){
  // code for check server side validation
  if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
    $msg="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.   
  }else{// Captcha verification is Correct. Final Code Execute here!    
    $msg="<span style='color:green'>The Validation code has been matched.</span>";    
  }
} 
	

	

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Free-to-Play</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="img/favicon.png" rel="shortcut icon">
 
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/form-elements.css">
  <link rel="stylesheet" href="css/form-style.css">
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <!--<link href="css/game.css" rel="stylesheet">-->

  </script>

  <link href="./css/stylecaptcha.css" rel="stylesheet">
<script type='text/javascript'>
function refreshCaptcha(){
  var img = document.images['captchaimg'];
  img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</head>

<body>
  <!--<div id="preloader"></div>-->
  <!--==========================
  Header Section
============================-->
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img>
        </a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Home</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->
  <!--==========================
  Hero Section
============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="top-content">
        <div class="inner-bg">
          <div class="container">
            <div class="row">
             
            <!--Sign in-->
              <div class="col-sm-5">
                <div class="form-box">
                  <div class="form-top">
                    <div class="form-top-left">
                      <h3>Login to our site</h3>
                      <p>Enter username and password to log on:</p>
                    </div>
                    <div class="form-top-right">
                      <i class="fa fa-lock"></i>
                    </div>
                  </div>
                  <div class="form-bottom">
                    <!--Sign in form-->
                    <form role="form" action="register.php" method="POST" class="login-form">
                      <div class="form-group">
                        <label class="sr-only" for="form-username">Username</label>
                        <input type="text" name="form-susername" placeholder="Username..." class="form-susername form-control" id="form-susername">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" name="form-spassword" placeholder="Password..." class="form-spassword form-control" id="form-spassword">
                      </div class="form-group">
                      <!-- <button type="submit" class="btn" id="submit" name="login" value="login">Sign in!</button> -->
                      <input type="submit" class="btn" id="submit" name="submit" value="login">
                    </form>
                    <!--End of Sign in form-->
                  </div>
                </div>
              </div>
              <!--End of Sign in-->
              <div class="col-sm-1 middle-border"></div>
              <div class="col-sm-1"></div>
              <!--Sign up-->
              <div class="col-sm-5">
                <div class="form-box">
                  <div class="form-top">
                    <div class="form-top-left">
                      <h3>Sign up now</h3>
                      <p>Fill in the form below to get instant access:</p>
                    </div>
                    <div class="form-top-right">
                      <i class="fa fa-pencil"></i>
                    </div>
                  </div>
                  <div class="form-bottom">
                    <!--Sign up form-->
                    <form role="form" action="register.php" method="POST" class="registration-form" >
                    	<div class="form-group">
                        <label class="sr-only" for="form-username">Username</label>
                        <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-first-name">First name</label>
                        <input type="text" name="form-first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-last-name">Last name</label>
                        <input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-email">Email</label>
                        <input type="text" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="form-age">Age</label>
                        <input type="text" name="form-age" placeholder="Age..." class="form-age form-control" id="form-age">
                      </div>
                      <!-- <button type="submit" class="btn" id="submit" name="submit" value="register">Sign me up!</button> -->



                        <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
                          <?php if(isset($msg)){?>
                          <tr> 
                            <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <td align="right" valign="top"> Validation code:</td>
                            <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
                              <label for='message'>Enter the code above here :</label>
                              <br>
                              <input id="captcha_code" name="captcha_code" type="text">
                              <br>
                              Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><!-- <input name="Submit" type="submit" onclick="return validate();" value="Submit" class="button1"> --></td>
                          </tr>
                        </table>

</form>


                      <input type="submit" onclick="return validate();" class="btn" id="submit" name="submit" value="register">
                    <!--End of form-->

                  </div>
                </div>
              </div>
              <!--End of Sign up-->
            </div>
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
  <script src="js/non-sticky.js"></script>
  <!-- Javascript -->
  <script src="lib/form/jquery.backstretch.min.js"></script>
  <script src="js/scripts.js"></script>
</body>

</html>