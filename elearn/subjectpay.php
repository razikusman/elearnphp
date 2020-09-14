<?php
	require 'connect.php'; 
	$postdata = file_get_contents("php://input"); //get the jason type data
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		$amount = mysqli_real_escape_string($con, trim($request -> amount));
		$id = mysqli_real_escape_string($con, (int)($request -> id));
		$Grade = mysqli_real_escape_string($con, (int)($request -> Grade));
		
		$sql1 = "UPDATE `subjects_teaching` SET `amount` = $amount where `subID` = $id AND `Grade` = $Grade";


		if(mysqli_query($con,$sql1))
		{
			http_response_code(204);
		}
		else{
			http_response_code(404);
		}
		
		$NIC = mysqli_real_escape_string($con, trim($request -> NIC));
		$sql2 = "Select SUM(`amount`)  AS SUM from `subjects_teaching` where `tNIC` = '$NIC'";
		
		$result = mysqli_query($con,$sql2);
		$row = mysqli_fetch_assoc($result);
		$sum= $row['SUM'];
		
		
		$sql3 = "UPDATE `teacher` SET `salary` = $sum where `NIC` = '$NIC' ";
		
		if(mysqli_query($con,$sql3))
		{
			http_response_code(204);
		}
		else{
			http_response_code(404);
		}
	}
	
?>