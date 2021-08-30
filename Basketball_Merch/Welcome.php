<?php
/*
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	//session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome You can start shopping <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p>  <a href="welcome.php" style="color: red;">Home </a> | <a href="welcome.php" style="color: red;">About Us</a> | <a href="contact-us.php" style="color: red;">Contact Us</a> | <a href="index.php?logout='1'" style="color: red;">logout</a> </p>&nbsp;
    <?php endif ?>
</div>
<?php
require_once("DBConn.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tbl_item WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
*/
?>

<!DOCTYPE html>

<html>


	<head>
		<meta charset="utf-8">
		<title> Home </title>
		
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
	    <meta content="" name="keywords">
	    <meta content="" name="description">
		<!-- Favicons -->
		

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

		<!-- Bootstrap CSS File -->
		<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Libraries CSS Files -->
		<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="lib/animate/animate.min.css" rel="stylesheet">

		<!-- Main Stylesheet File -->
		<link href="css/style.css" rel="stylesheet">
		
		
	</head>
	
	<body>
	
	  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
	  <a href="#hero"><img src="img/logo3.png" alt="" title="" /></img></a>
	  
	</div>
	
	<nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="ContactUs.php">Contact Us</a></li>
		 <li><a href="MyShop.php">My Shop</a></li>
          <li class="menu-has-children"><a href=""></a>
            <ul>
              <li><a href="#"></a></li>
              <li class="menu-has-children"><a href="#"></a>
                <ul>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                </ul>
              </li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
            </ul>
          </li>
          <li><a href="#contact"></a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
	
	<section id="hero">
    <div class="hero-container">
      <h1>Welcome to the Bando</h1>
      <h2>We sell basketball jerseys for all our Basketball fans</h2>
      <a href="MyShop.php" class="btn-get-started"> Game On!!!! </a>
    </div>
 
  
	
	</section>
	
          
	 </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
	  
	



	
	
	

	<footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>The Bando Merch</strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by Tshiamo</a>
      </div>
    </div>
  </footer><!-- #footer -->
	</body>
	
</html>