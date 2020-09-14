<?php 
	require 'connect.php';
	
	$student = [];
	
	//////////////////
	
	$sql1 = "SELECT * FROM `subjects_following`";
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$student[$cr]['Student_ID'] = $row['sID'];
			$student[$cr]['Subject_ID'] = $row['subID'];
			$id = $student[$cr]['Student_ID'];
			$subid = $student[$cr]['Subject_ID'];
			
			$sql1 = "SELECT sGrade,sName FROM `student` where sID = $id ";
			if($result2 = mysqli_query($con,$sql1))
			{
				
				while($row = mysqli_fetch_assoc($result2)){
					$student[$cr]['stu_Name'] = $row['sName'];
					$student[$cr]['stu_Grade'] = $row['sGrade'];
				}
				
			}
			
			$sql2 = "SELECT subName FROM `subjects` where subid = $subid ";
			if($result3 = mysqli_query($con,$sql2))
			{
				
				while($row = mysqli_fetch_assoc($result3)){
					$student[$cr]['sub_Name'] = $row['subName'];
				}
				
			}
			$sql2 = "SELECT tNIC FROM `subjects_teaching` where subID = $subid ";
			if($result3 = mysqli_query($con,$sql2))
			{
				
				while($row = mysqli_fetch_assoc($result3)){
					$student[$cr]['teacher_NIC'] = $row['tNIC'];
				}
				
			}
			$cr++;
		}echo json_encode($student);
		
		
		
	}
	else{
		http_response_code(404);
	}
	
	
	/*
	
			
			
			else{
				http_response_code(404);
			}*/
?>