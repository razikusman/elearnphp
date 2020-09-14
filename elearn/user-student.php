<?php 
	require 'connect.php';
	//$parent = [];
	$user = [];
	
	//////////////////
	
	$sql2 = "SELECT * FROM `student`";
	if($result = mysqli_query($con,$sql2))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$user[$cr]['name'] = $row['sName'];
			$user[$cr]['password'] = $row['sID'];
			$user[$cr]['sGrade'] = $row['sGrade'];
			$user[$cr]['sParentNIC'] = $row['sParentNIC'];
			$cr++;
		}
		echo json_encode($user);
		
		
		
		
	}
	else{
		http_response_code(404);
	}
?>