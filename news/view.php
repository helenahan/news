<html>
<head>

<?php
include ("includes.php");
include ("connection.php");
include ("login.php");
include ("navigation.php");

?>
<script>
function showhide(id) {
       	var e = document.getElementById(id);
       	e.style.display = (e.style.display == 'block') ? 'none' : 'block';
}
</script>
</head>

<body>

<br>
<br>

<?php


	 $qvri = "SELECT id FROM user WHERE username = '$username'";
	 $qvri_1 = mysqli_query($conn, $qvri);
	 
     $row= mysqli_fetch_assoc($qvri_1);
     $user_id = $row['id'];	



$view = "
	SELECT
	user.id,
	user.username,
	post.user_id,
	post.id,
	post.title,
	post.body,
	post.date_posted
	from user
	inner join post
	on user.id = post.user_id
	where user.id = '$user_id'
	order by post.date_posted
	DESC";
	
	$view_result = mysqli_query($conn, $view);
	
	if(mysqli_num_rows($view_result)>0){
		
	while($result = mysqli_fetch_assoc($view_result)){
		
		$post_id = $result['id'];
		$content = $result['body'];		
		$date = $result['date_posted']; 		
		$name = $result['username'];	
		$title = $result['title'];	
		
		echo"
		
<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-12'>
			<div class='row'>
				<div class='col-md-2'>
				</div>
				<div class='col-md-8' style='text-align: center;'>
					<a href=\"javascript:showhide('$post_id')\"><h3>
							   $title
					</h3></a>		
							by $name
							on $date
					<br>
					<div id='$post_id' style='display:none; text-align:left;''>
					<p>$content</p>
					</div>
				</div>
				<div class='col-md-2'>
			    </div>
			</div>
		</div>
	</div>
</div>
		";
	}
	}
	else{
		echo" <div class='container-fluid'>
	<div class='row'>
		<div class='col-md-12'>
			<div class='row'>
				<div class='col-md-2'>
				</div>
				<div class='col-md-8' style='text-align: center;'> <h2 > No posts yet! </h2>
				<br>
				<br>
				<button type='button' <button type='button' class='btn btn-info' onclick=\"location.href='add_post.php';\"> Add a post </button>
				</div>
				<div class='col-md-2'>
				</div>
			</div>
		</div>
	</div>
</div>";
	}

?>


</body>
</html>










