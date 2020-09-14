<?php 
	require 'connect.php';//conection to database
  
	$postdata = file_get_contents("php://input"); //get the jason type data
	
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array     
		
		//asign data to variables
		$sdate = mysqli_real_escape_string($con, ($request -> sdate));
		$edate = mysqli_real_escape_string($con, ($request -> edate));
		$quizzid = mysqli_real_escape_string($con, trim($request -> quizzid));
		$subid = mysqli_real_escape_string($con, trim($request -> subid));
		$grade = mysqli_real_escape_string($con, trim($request -> grade));
		
		//add to teacher table
		$sql2=" UPDATE `listquize` SET sdate = '$sdate' , edate = '$edate' where quizzid = $quizzid AND subid = '$subid' AND grade = '$grade' ";
		//$sql2 = "UPDATE `teacher` SET tName = $name , tContact = $tContact , qualification = $qualification , Gender = $gender where NIC = '973262622' ";
		
		if(mysqli_query($con,$sql2))
		{
			http_response_code(201);
		}
		
		else{
			http_response_code(404);
		}
		
	}
?>