<?php 
	require 'connect.php';
	
	$quize = [];
	
	//////////////////
	
	$sql1 = "SELECT * FROM `listquize`";
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$quize[$cr]['quizzid'] = $row['quizzid'];
			$quize[$cr]['sdate'] = $row['sdate'];
			$quize[$cr]['edate'] = $row['edate'];
			$quize[$cr]['grade'] = $row['grade'];
			$quize[$cr]['subid'] = $row['subid'];
			
			$cr++;
		}echo json_encode($quize);
		
	}
	else{
		http_response_code(404);
	}
	
	
	/*
	
			
			
			else{
				http_response_code(404);
			}*/
?>