<?php
error_reporting(E_ALL);
include("connection.php");
include("includes.php");
session_start();


if(isset($_POST['login-submit'])){
	
	$username = stripslashes($_POST['username']);
	$password = stripslashes(md5($_POST['password']));
	
	$query = "SELECT * FROM user where username = '$username' and password = '$password'";
	$result = mysqli_query($conn, $query) or die (mysql_error());
	$rows = mysqli_num_rows($result);
	
	
	if($rows == 1) {
		$_SESSION['username'] = $username;				
		header('Location: home.php');
	}
	else{
		echo 
				
				'<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
				<div class="alert alert-danger" style="text-align:center;">
                <strong><h3>Username/password is incorrect.</h3><strong> 
				<br/>Click here to <a href="index.php">Login</a></div>
				</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>';
	}
	

	
	
	
}



?>

