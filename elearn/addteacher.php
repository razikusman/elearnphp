<?php 
	require 'connect.php';//conection to database
  
	$postdata = file_get_contents("php://input"); //get the jason type data
	
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		//asign data to variables
		$name = mysqli_real_escape_string($con, trim($request -> name));
		$tContact = mysqli_real_escape_string($con, (int)($request -> contact));
		$gender = mysqli_real_escape_string($con, trim($request -> gender));
		$qualification = mysqli_real_escape_string($con, trim($request -> qualification));
		$user = mysqli_real_escape_string($con, trim($request -> user));
		$NIC = mysqli_real_escape_string($con, trim($request -> userid));
		$password = mysqli_real_escape_string($con, trim($request -> password));
		$subject = mysqli_real_escape_string($con, trim($request -> sub));
		$grade = mysqli_real_escape_string($con, trim($request -> grade));
		
		
		//add to user table
		$sql1 = "INSERT INTO user( uType,uID,uPassword ) VALUES( '{$user}','{$NIC}','{$password}' )";
		
		if(mysqli_query($con,$sql1))
		{
			http_response_code(201);
		}
		
		//add to teacher table
		$sql2 = "INSERT INTO teacher( NIC,tName,tContact,qualification,Gender ) VALUES( '{$NIC}','{$name}','{$tContact}','{$qualification}','{$gender}' )";
		
		if(mysqli_query($con,$sql2))
		{
			http_response_code(201);
		}
		
		//get the subid from subject table
		$sql1 = "SELECT `subId` FROM `subjects` where `subName` = '$subject'";
		$result = mysqli_query($con,$sql1);
		$row = mysqli_fetch_assoc($result);
		$subID= $row['subId'];

		//add to subject teaching table
		$sql3 = "INSERT INTO subjects_teaching( subID,tNIC,Grade ) VALUES( '{$subID}','{$NIC}','{$grade}' )";
		
		if(mysqli_query($con,$sql3))
		{
			http_response_code(201);
		}
	}
	
?>