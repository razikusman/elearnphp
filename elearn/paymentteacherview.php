<?php 
	require 'connect.php';
	
	$payment = [];
	
	//////////////////
	
	$sql1 = "SELECT * FROM `salrypayments`";
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$payment[$cr]['userid'] = $row['tNIC'];
			$payment[$cr]['date'] = $row['date'];
			$payment[$cr]['year'] = $row['year'];
			$payment[$cr]['month'] = $row['month'];
			$payment[$cr]['amount'] = $row['amount'];
			$payment[$cr]['status'] = $row['status'];
			//$payment[$cr]['row'] = $row['tNIC']+$row['date'];
			$id = $payment[$cr]['userid'];
			$sql2 = "SELECT qualification,tName FROM `teacher` where NIC = $id";
			if($result2 = mysqli_query($con,$sql2))
			{
				while($row = mysqli_fetch_assoc($result2)){
					$payment[$cr]['Tchr_qualification'] = $row['qualification'];
					$payment[$cr]['name'] = $row['tName'];
				}
			}
			$cr++;
		}echo json_encode($payment);
			
	}
	else{
		http_response_code(404);
	}
	
?>