<?php 
	// Database configuration 
	include("../functions.php");
	// Create database connection 
	// Check connection 
	// Get search term 
	$itemname = $_POST['postitemname'];
	$id = $_POST['postid'];
	$unit = $_POST['postunit'];
	$qty = $_POST['postqty'];
	$description = $_POST['postdescription'];
	$amount = $_POST['postamount'];
	$fname = $_POST['postfname'];
	$department = $_POST['postdepartment'];
	$total = $qty * $amount;
	$query = "UPDATE supply_tbl SET `itemname` = '$itemname', `description` = '$description' , `qty` = '$qty', `unit`='$unit', `amount` = '$amount', `totalamount` = '$total', `CreateBy` = '$fname', `Department` = '$department' WHERE `id` = '$id' ";
	mysqli_query($conn, $query);
	
?>