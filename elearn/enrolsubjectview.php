<?php 
	require 'connect.php';
	
	$subjects = [];
	
	//////////////////
	
	$sql1 = "SELECT * FROM `permisin`";
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$subjects[$cr]['Sub_ID'] = $row['subjectID'];
			$subjects[$cr]['stu_id'] = $row['sID'];
			$subjects[$cr]['permision'] = $row['Permision'];
			
			$id = $subjects[$cr]['Sub_ID'];
			
			$sql1 = "SELECT subName FROM `subjects` where subId = $id ";
			if($result2 = mysqli_query($con,$sql1))
			{
				
				while($row = mysqli_fetch_assoc($result2)){
					$subjects[$cr]['sub_Name'] = $row['subName'];
				}
				
			}
			$cr++;
		}echo json_encode($subjects);
			
	}
	else{
		http_response_code(404);
	}
	

/*$sql1 = "SELECT sGrade,sName FROM `student` where sID = $id ";
			if($result2 = mysqli_query($con,$sql1))
			{
				
				while($row = mysqli_fetch_assoc($result2)){
					$student[$cr]['stu_Name'] = $row['sName'];
					$student[$cr]['stu_Grade'] = $row['sGrade'];
					
					
				}
				
			}
			$sql1 = "SELECT subName FROM `subjects` where subid = $subid ";
			if($result2 = mysqli_query($con,$sql1))
			{
				
				while($row = mysqli_fetch_assoc($result2)){
					$student[$cr]['sub_Name'] = $row['subName'];
				}
				
			}
			$cr++;
		}echo json_encode($student);*/
?>