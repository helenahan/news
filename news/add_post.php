<html>
<head>

<?php
include ("includes.php");
include ("connection.php");
include ("login.php");
include ("navigation.php");


?>

</head>

<body>

<br>
<br>

<!-- summernote editor -->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">   
					<form method="post" enctype="multipart/form-data">
						
						<h3 style="text-align:center;"> Title </h3>
						<input type='text' class='form-control' name='title' required>
						<br>
					    <h3 style="text-align:center;"> Content </h3>
						
							<textarea id='summernote' name='content'></textarea>												
					    <br>						
						<button type="submit" class="btn btn-primary btn-block" name="submit">Post</button>
					</form>
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>
	</div>
</div>

<!-- /summernote editor -->
</body>
</html>

<?php
 if(isset($_POST['submit'])){
	 
	 $title = $_POST['title'];
	 $body = $_POST['content'];
	 
	 
	 $qvri = "SELECT id FROM user WHERE username = '$username'";
	 $qvri_1 = mysqli_query($conn, $qvri);
	 
     $row= mysqli_fetch_assoc($qvri_1);
     $user_id = $row['id'];	
	 
	 $date_posted = date("Y:m:d H:i:s");
	 
	$query = "INSERT INTO post (title, body, user_id, date_posted) values ('$title', '$body', '$user_id', '$date_posted')"; 
	
	$result = mysqli_query($conn, $query);
	
	
	header("Location: view.php");
	
 }

?>

 





