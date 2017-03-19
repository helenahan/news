<?php
error_reporting(E_ALL);

include ("connection.php");
include ("includes.php");
session_start();

if (isset($_POST['register-submit'])){
		
	$username = stripslashes($_POST['username']);
	$email = stripslashes($_POST['email']);
	$password = stripslashes(md5($_POST['password']));
	$joined_date = date("Y:m:d H:i:s");
	
	
	$sql = "SELECT * FROM user WHERE username = '$username' OR email = '$email' ";
	$check = mysqli_query($conn, $sql);
	

if(mysqli_num_rows($check) > 0){
        echo '<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
				<div class="alert alert-danger" style="text-align:center;">
                <strong><h3>Username or email is already in use</h3><strong> 
				<br/>Click here to <a href="index.php">Register</a></div>
				</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>';
}else{
	
	$query = "INSERT INTO user (username, email, password, joined_date) VALUES ('$username', '$email', '$password', '$joined_date')";
	$result = mysqli_query($conn, $query);
	
	if($result) {
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $user_id;
		
		header('Location: home.php');
	}
} }
	/* else {
		header('Location: index.php');
		
	} */

?>