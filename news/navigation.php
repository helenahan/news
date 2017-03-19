<?php
$username = $_SESSION['username'];

?>

<!--navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">MakeSomeNews</a>
    </div>
	<ul class="nav navbar-nav">
      <li><a href="add_post.php">Add post</a></li>
      <li><a href="view.php">View my posts</a></li>
      
    </ul>
  
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <strong style="text-transform: uppercase;"><?php echo $username ?></strong></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<!-- /navigation -->