<?php 
	require 'connect.php';
	
	$quize = [];
	
	//////////////////
	
	$sql1 = "SELECT * FROM `quize`";
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$quize[$cr]['question'] = $row['question'];
			$quize[$cr]['answer1'] = $row['answer1'];
			$quize[$cr]['answer2'] = $row['answer2'];
			$quize[$cr]['answer3'] = $row['answer3'];
			$quize[$cr]['answer4'] = $row['answer4'];
			$quize[$cr]['answer'] = $row['answer'];
			$quize[$cr]['quizzid'] = $row['quizzid'];
			$quize[$cr]['subId'] = $row['subId'];
			
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