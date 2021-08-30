<?php
include ('DBConn.php');
include ('tblcreate.php');


/*

if(isset($_POST['submit'])) //Check if the submit button is pressed 
{
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	
	
	
	echo $username."<br>";
	echo $pass."<br>";
	
	$sql = "SELECT username, password FROM users WHERE username = '$username' AND password = '$pass'";
	$result = mysqli_query($connection, $sql);
	
	//store the results of the select in an array called $row
	
	$row = mysqli_fetch_array($result);
	
	$x = $row['username'];
	$y = $row['password'];
	
	//validation
	if(empty ($username))
	{
		$output = "Please enter email";
		
	}
	
	else{
		if($x == $username && $y == $pass){
		
		header("location:Welcome.php");
		
		}
		
		else{
			echo"Incorrect Password/Username";
			
		}
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
				<form class="login100-form validate-form" method="post" action="LogIn.php">
					<span class="login100-form-title p-b-34">
					Log in
					</span>
	
				<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" >
			  
			  
					<input  id="first-name" class="input100 type="text" name="username" placeholder="user name">
					<span class="focus-input100"></span>
		  
				</div>
		  
		  <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
			  
			  <input class="input100" type="password"  name="password"  placeholder="Password">
			  <span class="focus-input100"></span>
		  </div>
			
			
			<div class="container-login100-form-btn">
			
				<button class="login100-form-btn"  type="submit" class="btn" name="login_user" >
				
				Log in
				
				</button>
		   </div>
			
			
			
						
		
		  <div class="w-full text-center">
				
				<a href = "Registration.php" class="txt3" > Register </a>
			</div>
			
			
		</form>
	
				<div class="login100-more" style="background-image: url('images/Scottie.jpg');"></div>
					
					</div>
						</div>
							</div>
	
	</body>
</html>