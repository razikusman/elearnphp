<?php 
	require 'connect.php';
	
	$materials = [];
	
	//////////////////
	
	$sql1 = "SELECT * FROM `zz`";
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$materials[$cr]['material'] = $row['name'];
			$cr++;
		}echo json_encode($materials);
		http_response_code(201);
			
	}
	else{
		http_response_code(404);
	}
	
?>