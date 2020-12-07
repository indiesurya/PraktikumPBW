<?php 
session_start();
require 'functions.php';
if(isset($_SESSION['login'])){
	header("Location: index.php");
	exit;	
}

if(isset($_POST["submit"])){
	global $conn;
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$login = mysqli_query($conn,"SELECT * FROM user_level WHERE username='$username' AND password='$password'");
	$cek = mysqli_num_rows($login);
	 
	if($cek > 0){
		$data = mysqli_fetch_assoc($login);
		if($data['level']=="pegawai"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "pegawai";
			$_SESSION['login'] = true;
			header("location:index.php");
		}
		else{
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			$_SESSION['login'] = true;
			header("location:index.php");
		}
	}
	else{
		header("location:login.php");
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'navbar.php';?>
	<br><br>
	<div class="kotak_login">
		<p class="tulisan_login">LOGIN</p>
		<form action="" method="POST">
			<label for="username">Username</label>
			<input type="text" name="username" id="username"class="form_login" placeholder="Username .." required="required">
 
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" name="submit" class="tombol_login" value="LOGIN">
 
			<br/>
			<br/>
		</form>	
	</div>
</body>
</html>