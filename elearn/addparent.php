<?php 
require 'connect.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');
	  
	
	$postdata = file_get_contents(`php://input`);
	
	if(isset($postdata) && !empty($postdata))
	{
		json_decode('$postdata');
		echo 'sdsd';
		
		$name = mysqli_real_escape_string($con, trim($request -> name));
		$pContact = mysqli_real_escape_string($con, (int)($request -> pContact));
		$user = mysqli_real_escape_string($con, trim($request -> user));
		$NIC = mysqli_real_escape_string($con, trim($request -> NIC));
		$password = mysqli_real_escape_string($con, trim($request -> password));

		$sql = "INSERT INTO 'zz'('name','pContact','user','NIC','password') VALUES('{$name}','{$pContact}','{$user}','{$NIC}','{$password}')";
	}
	
?>