<?php 
	// Database configuration 
	include("../functions.php");
	// Create database connection 
	
	// Check connection 
	
	
	// Get search term 
	$my_date = date("Y-m-d h:i:s");
	$id = $_POST['postid'];
	$query = "DELETE FROM supply_tbl WHERE id = '$id'";
	mysqli_query($conn, $query);
?>