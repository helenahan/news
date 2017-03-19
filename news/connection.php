<?php

$conn = mysqli_connect("localhost", "root", "", "log_db");

if (mysqli_connect_errno()) {
	echo "Conection failed: " .mysqli_connect_errno();
}

?>