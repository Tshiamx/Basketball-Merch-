<?php
include ('DBConn.php');
/*
if(isset($_POST['submit'])) //Check if the submit button is pressed 
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	
	
	echo $username."<br>";
	echo $email."<br>";
	echo $pass."<br>";
	echo $cpass."<br>";
	
	
	$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email','$pass')";
	$result = mysqli_query($connection, $sql);
	
	if($result){
		echo "You have successfully been registered";
	}
	else{
		echo "An errror occured";
	}
}
*/
?>

<!DOCTYPE html>

<html>

	<head>

		<title> Ice Task 1 </title>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
		
	</head>
	
	<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="Registration.php">
					<?php include('errors.php'); ?>
					<span class="login100-form-title p-b-34">
					Registration
					</span>
	
	
		
		
		
			<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" >
				<input class="input100" type="text"  name="username"  value="<?php echo $username; ?>" placeholder="User name" >
					<span class="focus-input100"></span>
			</div>
		  
			<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" >
				<input class="input100" type="text"  name="email" value="<?php echo $email; ?>" placeholder="Email">
					<span class="focus-input100"></span>
			</div>
		  
		  
			<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" >
				<input  class="input100" type="password"  name="password_1"  placeholder="Password">
					<span class="focus-input100"></span>
			</div>
					
			<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
				<input class="input100" type="password"  name="password_2" placeholder=" Confirm Password">
						<span class="focus-input100"></span>
			</div>
			
			<div class="container-login100-form-btn" >
				<button class="login100-form-btn"  type="submit" name="reg_user" class="btn">
							Register
				</button>
			</div>
			
			<div class="w-full text-center">
				Click here to go back to <a href = "Login.php" class="txt3"> Login </a>
				</div>
			
		
		
	</form>
		
		<div class="login100-more" style="background-image: url('images/steph.jpg');"></div> 
		 
	</div>
		</div>
	</div>
	
	
	
	
	</body>
