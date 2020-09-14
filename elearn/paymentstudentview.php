<?php 
	require 'connect.php';
	
	$payment = [];
	
	//////////////////
	
	$sql1 = "SELECT * FROM `payments`";
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$payment[$cr]['Student_ID'] = $row['sID'];
			$payment[$cr]['date'] = $row['date'];
			$payment[$cr]['year'] = $row['year'];
			$payment[$cr]['month'] = $row['month'];
			$payment[$cr]['amount'] = $row['amount'];
			$payment[$cr]['status'] = $row['status'];
			$id = $payment[$cr]['Student_ID'];
			$sql2 = "SELECT sGrade,sName FROM `student` where sID = $id";
			if($result2 = mysqli_query($con,$sql2))
			{
				while($row = mysqli_fetch_assoc($result2)){
					$payment[$cr]['grade'] = $row['sGrade'];
					$payment[$cr]['name'] = $row['sName'];
				}
			}
			$cr++;
		}echo json_encode($payment);
			
	}
	else{
		http_response_code(404);
	}
	
?>