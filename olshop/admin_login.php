<?php

session_start();
include 'koneksi_olshop.php';

$_SESSION['admin'] = 0;
$username = ' ';
$password = ' ';


if (isset($_POST['submit'])) {

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$login = mysqli_query($conn, "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'");

	if (mysqli_num_rows($login) == 0) {
		header("Location: admin_login.php?error=1");
	} else {
		$_SESSION['admin'] = 1;
		header("Location: Admin.html");
	}
	
}

?><!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="styleLogin.css">
</head>
<body>
	<div class="hero">
		<div class="navbar"> 
			<h4>OL<span>SHOP</span></h4>
			<ul>
				<li><a href="Main.html">Home<a/></li>
				<li><a href="Barang.php">Barang<a/></li>
				<li><a href="admin.php">Admin<a/></li>
			</ul>
		</div>
	</div>
	<div class="login">
		<form action="" method="post">
			<p>Username</p>
			<input type="text" name="username">
			
			<p>Password</p>
			<input type="password" name="password">
			<?php
			if(isset($_GET['error'])==true){
				echo '<font color="#FF0000"><p>Wrong Password</p></font>';
			}
			?>
			<div class="tombol">
				<input type="submit" name="submit" value="Login">
			</div>
		</form>
	</div>
</body>

</html>
