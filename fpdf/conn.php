<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dbinventory";
	$conn = mysqli_connect($host,$username,$password,$dbname);
	if(!$conn){
    		die("Error: Failed to connect to database!");
    	}
?>