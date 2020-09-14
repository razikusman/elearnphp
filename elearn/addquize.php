<?php 
	require 'connect.php';//conection to database
  
	$postdata = file_get_contents("php://input"); //get the jason type data
	
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		//asign data to variables
		$q1 = mysqli_real_escape_string($con, trim($request -> q1));
		$q1a1 = mysqli_real_escape_string($con, trim($request -> q1a1));
		$q1a2 = mysqli_real_escape_string($con, trim($request -> q1a2));
		$q1a3 = mysqli_real_escape_string($con, trim($request -> q1a3));
		$q1a4 = mysqli_real_escape_string($con, trim($request -> q1a4));
		$q1c = mysqli_real_escape_string($con, trim($request -> q1c));
		
		$q2 = mysqli_real_escape_string($con, trim($request -> q2));
		$q2a1 = mysqli_real_escape_string($con, trim($request -> q2a1));
		$q2a2 = mysqli_real_escape_string($con, trim($request -> q2a2));
		$q2a3 = mysqli_real_escape_string($con, trim($request -> q2a3));
		$q2a4 = mysqli_real_escape_string($con, trim($request -> q2a4));
		$q2c = mysqli_real_escape_string($con, trim($request -> q2c));
		
		$q3 = mysqli_real_escape_string($con, trim($request -> q3));
		$q3a1 = mysqli_real_escape_string($con, trim($request -> q3a1));
		$q3a2 = mysqli_real_escape_string($con, trim($request -> q3a2));
		$q3a3 = mysqli_real_escape_string($con, trim($request -> q3a3));
		$q3a4 = mysqli_real_escape_string($con, trim($request -> q3a4));
		$q3c = mysqli_real_escape_string($con, trim($request -> q3c));
		
		$q4 = mysqli_real_escape_string($con, trim($request -> q4));
		$q4a1 = mysqli_real_escape_string($con, trim($request -> q4a1));
		$q4a2 = mysqli_real_escape_string($con, trim($request -> q4a2));
		$q4a3 = mysqli_real_escape_string($con, trim($request -> q4a3));
		$q4a4 = mysqli_real_escape_string($con, trim($request -> q4a4));
		$q4c = mysqli_real_escape_string($con, trim($request -> q4c));
		
		$q5 = mysqli_real_escape_string($con, trim($request -> q5));
		$q5a1 = mysqli_real_escape_string($con, trim($request -> q5a1));
		$q5a2 = mysqli_real_escape_string($con, trim($request -> q5a2));
		$q5a3 = mysqli_real_escape_string($con, trim($request -> q5a3));
		$q5a4 = mysqli_real_escape_string($con, trim($request -> q5a4));
		$q5c = mysqli_real_escape_string($con, trim($request -> q5c));
		
		$q6 = mysqli_real_escape_string($con, trim($request -> q6));
		$q6a1 = mysqli_real_escape_string($con, trim($request -> q6a1));
		$q6a2 = mysqli_real_escape_string($con, trim($request -> q6a2));
		$q6a3 = mysqli_real_escape_string($con, trim($request -> q6a3));
		$q6a4 = mysqli_real_escape_string($con, trim($request -> q6a4));
		$q6c = mysqli_real_escape_string($con, trim($request -> q6c));
		
		$q7 = mysqli_real_escape_string($con, trim($request -> q7));
		$q7a1 = mysqli_real_escape_string($con, trim($request -> q7a1));
		$q7a2 = mysqli_real_escape_string($con, trim($request -> q7a2));
		$q7a3 = mysqli_real_escape_string($con, trim($request -> q7a3));
		$q7a4 = mysqli_real_escape_string($con, trim($request -> q7a4));
		$q7c = mysqli_real_escape_string($con, trim($request -> q7c));
		
		$q8 = mysqli_real_escape_string($con, trim($request -> q8));
		$q8a1 = mysqli_real_escape_string($con, trim($request -> q8a1));
		$q8a2 = mysqli_real_escape_string($con, trim($request -> q8a2));
		$q8a3 = mysqli_real_escape_string($con, trim($request -> q8a3));
		$q8a4 = mysqli_real_escape_string($con, trim($request -> q8a4));
		$q8c = mysqli_real_escape_string($con, trim($request -> q8c));
		
		$q9 = mysqli_real_escape_string($con, trim($request -> q9));
		$q9a1 = mysqli_real_escape_string($con, trim($request -> q9a1));
		$q9a2 = mysqli_real_escape_string($con, trim($request -> q9a2));
		$q9a3 = mysqli_real_escape_string($con, trim($request -> q1a3));
		$q9a4 = mysqli_real_escape_string($con, trim($request -> q9a4));
		$q9c = mysqli_real_escape_string($con, trim($request -> q9c));
		
		$q10 = mysqli_real_escape_string($con, trim($request -> q10));
		$q10a1 = mysqli_real_escape_string($con, trim($request -> q10a1));
		$q10a2 = mysqli_real_escape_string($con, trim($request -> q10a2));
		$q10a3 = mysqli_real_escape_string($con, trim($request -> q10a3));
		$q10a4 = mysqli_real_escape_string($con, trim($request -> q10a4));
		$q10c = mysqli_real_escape_string($con, trim($request -> q10c));
		
		$sdate = mysqli_real_escape_string($con, trim($request -> sdate));
		$edate = mysqli_real_escape_string($con, trim($request -> edate));
		$subid = mysqli_real_escape_string($con, trim($request -> subid));
		$grade = mysqli_real_escape_string($con, trim($request -> grade));
		$quizenumber = mysqli_real_escape_string($con, trim($request -> quizenumber));
		
		
		//add to quize table listquize
		$sql1 = "INSERT INTO quize( quizzid,question,answer1,answer2,answer3,answer4,answer,question_Num,subid ) VALUES
				( '{$quizenumber}','{$q1}','{$q1a1}','{$q1a2}','{$q1a3}','{$q1a4}' ,'{$q1c}','{$subid}',1),
				( '{$quizenumber}','{$q2}','{$q2a1}','{$q2a2}','{$q2a3}','{$q2a4}' ,'{$q2c}','{$subid}',2),
				( '{$quizenumber}','{$q3}','{$q3a1}','{$q3a2}','{$q3a3}','{$q3a4}' ,'{$q3c}','{$subid}',3),
				( '{$quizenumber}','{$q4}','{$q4a1}','{$q4a2}','{$q4a3}','{$q4a4}' ,'{$q4c}','{$subid}',4),
				( '{$quizenumber}','{$q5}','{$q5a1}','{$q5a2}','{$q5a3}','{$q5a4}' ,'{$q5c}','{$subid}',5),
				( '{$quizenumber}','{$q6}','{$q6a1}','{$q6a2}','{$q6a3}','{$q6a4}' ,'{$q6c}','{$subid}',6),
				( '{$quizenumber}','{$q7}','{$q7a1}','{$q7a2}','{$q7a3}','{$q7a4}' ,'{$q7c}','{$subid}',7),
				( '{$quizenumber}','{$q8}','{$q8a1}','{$q8a2}','{$q8a3}','{$q8a4}' ,'{$q8c}','{$subid}',8),
				( '{$quizenumber}','{$q9}','{$q9a1}','{$q9a2}','{$q9a3}','{$q9a4}' ,'{$q9c}','{$subid}',9),
				( '{$quizenumber}','{$q10}','{$q10a1}','{$q10a2}','{$q10a3}','{$q10a4}' ,'{$q10c}','{$subid}',10)";
		
		if(mysqli_query($con,$sql1))
		{
			http_response_code(201);
		}
		
		//add to listquize table 
		$sql2 = "INSERT INTO listquize(quizzid,sdate,edate,subid ,grade ) VALUES( '{$quizenumber}','{$sdate}','{$edate}','{$subid}','{$grade}' )";
		
		if(mysqli_query($con,$sql2))
		{
			http_response_code(201);
		}
		
		
		
		
	}
	
?>