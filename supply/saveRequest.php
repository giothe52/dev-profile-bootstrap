<?php 
	// Database configuration 
	include("../functions.php");
	// Create database connection 
	
	// Check connection 
	
	
	// Get search term 
	$tempID = $_POST['postid'];
	$unit = $_POST['postItemUnit'];
	$description = $_POST['postItemDescription'];
	$user = $_POST['postName'];
	$dept = $_POST['postDept'];
	$qty = $_POST['postRqty'];
	$amount = $_POST['postamount'];
	$total = $qty * $amount;
	//$bawas = "";
	$query1 = "INSERT INTO `supplyrequest_tbl`(`unit`, `description`, `qty_request`,`amount`,`totalamount`, `RequestBy`, `RequestorDepartment`,`Status`) VALUES ('$unit','$description','$qty','$amount','$total','$user','$dept','PENDING')";
	mysqli_query($conn, $query1);
	
?>