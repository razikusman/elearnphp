<?php 
	require 'connect.php';//conection to database
	$postdata = file_get_contents("php://input"); //get the jason type data
	
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		//asign data to variables
		$quizid = mysqli_real_escape_string($con, trim($request -> quizid));
		$studentid = mysqli_real_escape_string($con, trim($request -> studentid));
		$subid = mysqli_real_escape_string($con, trim($request -> subid));
		$score = mysqli_real_escape_string($con, trim($request -> score));

		//add to user table
		$sql1 = "INSERT INTO quizeresult( quizid,studentid,subid,score ) VALUES( '{$quizid}','{$studentid}', '{$subid}','{$score}')";
		
		if(mysqli_query($con,$sql1))
		{
			http_response_code(201);
		}
	}
	
?>