<?php 
	require 'connect.php';//conection to database
  
	$postdata = file_get_contents("php://input"); //get the jason type data
	
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		//asign data to variables
		$name = mysqli_real_escape_string($con, ($request -> name));
		$tContact = mysqli_real_escape_string($con, trim($request -> contact));
		$gender = mysqli_real_escape_string($con, trim($request -> gender));
		$qualification = mysqli_real_escape_string($con, trim($request -> qualification));
		$NIC = mysqli_real_escape_string($con, trim($request -> ID));
		
		//add to teacher table
		$sql2=" UPDATE `teacher` SET tName = '$name' , tContact = $tContact ,qualification = '$qualification' ,Gender = '$gender' where NIC = $NIC";
		
		if(mysqli_query($con,$sql2))
		{
			http_response_code(201);
		}
		
		else{
			http_response_code(404);
		}
		
	}
?>