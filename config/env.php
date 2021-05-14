<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "netsuite";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
	echo "Failed to connect to database!";
	exit;
}
?>