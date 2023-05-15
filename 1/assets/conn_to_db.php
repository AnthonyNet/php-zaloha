<?php
//connect to setek database
$db_host = "localhost";
$username = "root";
$password = "";
$db_name = "setek";

$connection = mysqli_connect($db_host, $username, $password, $db_name);
if (mysqli_connect_error()) {
	echo mysqli_connect_error();
	exit;
}
?>