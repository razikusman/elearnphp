<?php 
	require 'connect.php';
	//$parent = [];
	$user = [];
	
	//////////////////
	
	$sql2 = "SELECT * FROM `teacher`";
	if($result = mysqli_query($con,$sql2))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$user[$cr]['name'] = $row['tName'];
			$user[$cr]['password'] = $row['NIC'];
			$teacher[$cr]['type'] = $row['qualification'];
			//$user[$cr]['type'] = $row['uType'];
			//$id = $teacher[$cr]['Parent_NIC'];
			$cr++;
		}
		echo json_encode($user);
		
	}
	else{
		http_response_code(404);
	}
	
?>