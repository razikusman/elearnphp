<?php 
	require 'connect.php';
	//$parent = [];
	$teacher = [];
	
	//////////////////
	
	$sql2 = "SELECT * FROM `teacher`";
	if($result = mysqli_query($con,$sql2))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$teacher[$cr]['Teacher_NIC'] = $row['NIC'];
			$teacher[$cr]['qualification'] = $row['qualification'];
			$teacher[$cr]['Name'] = $row['tName'];
			$teacher[$cr]['Gender'] = $row['Gender'];
			$teacher[$cr]['Contact'] = $row['tContact'];
			$teacher[$cr]['Salary'] = $row['salary'];
			$cr++;
		}
		echo json_encode($teacher);
		
	}
	else{
		http_response_code(404);
	}
	
?>