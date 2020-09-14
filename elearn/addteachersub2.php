<?php 
	require 'connect.php';//conection to database
  
	$postdata = file_get_contents("php://input"); //get the jason type data
	
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		//asign data to variables
		$NIC = mysqli_real_escape_string($con, trim($request -> userid));
		$subject = mysqli_real_escape_string($con, trim($request -> sub));
		$grade = mysqli_real_escape_string($con, trim($request -> grade));
		
		//get the subid from subject table
		$sql1 = "SELECT subId FROM `subjects` where subName = '$subject'";
		$result = mysqli_query($con, $sql1);
		$subID = mysqli_fetch_row($result);
		echo $subID[0];

		//add to subject teaching table
		$sql2 = "INSERT INTO subjects_teaching( subID,tNIC,Grade ) VALUES( '{$subID[0]}','{$NIC}','{$grade}' )";
		
		if(mysqli_query($con,$sql2))
		{
			http_response_code(201);
		}
	}
	
?>