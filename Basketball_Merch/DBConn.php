<?php

class DBController {
	private $host="localhost";
	private $username="root";
	private $password="";
	private $database="18000252_Task1";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->username,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// initializing variables
$username = "";
$email    = "";
$errors = array();
$database =  "18000252_Task1";

$connection = mysqli_connect('localhost', 'root', '');


$selectDB = mysqli_select_db($connection,$database);

	
	//Check connection if it is working, when connected
	
	if(mysqli_connect_error()){
		echo "Failed to connect to MySql: " .mysqli_connect_error();
		
	}
	else {
		
		echo "Connected to MySQL ";
	
	}
	
	
	//Selecting the database to use
	
	$selectDB = mysqli_select_db($connection,$database);
	
	
	//creating the databse if it does not exist
	if($selectDB === FALSE){
		
		$sql = "CREATE DATABASE $database";
		mysqli_query($connection, $sql);
		echo "Database".$database." successfully created";
		
	} else{
		
		echo "Database already exist"."<br>";
	}
	
	$selectDB = mysqli_select_db($connection,$database);
	
	// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM tbl_customer WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($connection, $user_check_query);
  $username = mysqli_fetch_assoc($result);
  
  if ($username) { // if user exists
    if ($username['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($username['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO tbl_customer (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($connection, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: logIn.php');
  }
}

// LOGIN USER

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  
  if($username == "admin" && $password == "admin") {
	  
	  $_SESSION['username1'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  header('location: admin/userMan.php');  
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($connection, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: Welcome.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



	// initialize variables
	$name = "";
	$code = "";
	$price = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$code = $_POST['code'];
		$price = $_POST['price'];
		$imageURL = "\images/pic2.jpg";
		
		mysqli_query($connection, "INSERT INTO tbl_item (name, code, image, price) VALUES ('$name', '$code','$imageURL', '$price')"); 
		$_SESSION['message'] = "Product added!!!"; 
		header('location: admin/productsList.php');	
	}
	
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$code = $_POST['code'];
		$price = $_POST['price'];

		mysqli_query($connection, "UPDATE tbl_item SET name='$name', code='$code', price = '$price' WHERE id=$id");
		$_SESSION['message'] = "Product updated!"; 
		header('location: admin/productsList.php');
	}
	
		if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($connection, "DELETE FROM tbl_item WHERE id=$id");
		$_SESSION['message'] = "Product deleted!"; 
		header('location: productsList.php');
	}
	
		if (isset($_GET['deluser'])) {
		$id = $_GET['deluser'];
		mysqli_query($connection, "DELETE FROM tbl_customer WHERE id=$id");
		$_SESSION['message'] = "Customer deleted!"; 
		header('location: userMan.php');
	}
	
?>
