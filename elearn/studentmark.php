<?php
	require 'connect.php'; 
	$postdata = file_get_contents("php://input"); //get the jason type data
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		$month = mysqli_real_escape_string($con, trim($request -> monthtoday));
		$count = mysqli_real_escape_string($con, (int)($request -> atendance));
		$subid = mysqli_real_escape_string($con, trim($request -> subject));
		$stuid =  mysqli_real_escape_string($con, trim($request -> id));
		
		$sql4 = "UPDATE `attendance` SET `count` = $count where `sID` = $stuid AND `subID` = $subid AND `month` = $month ";


		if(mysqli_query($con,$sql4))
		{
			http_response_code(204);
		}
		else{
			http_response_code(404);
		}
	}
	
?>