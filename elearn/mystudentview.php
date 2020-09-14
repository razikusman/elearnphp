<?php 
	require 'connect.php';
	
	$student = [];
	
	//////////////////
	
	$sql1 = "SELECT
    *
FROM
    `student`
INNER JOIN `parent` ON(
        student.sParentNIC = parent.NIC
    )
INNER JOIN `subjects_following` ON(
        student.sID = subjects_following.sID
    )
INNER JOIN `subjects` ON(
        subjects_following.subID = subjects.subId
	)
INNER JOIN `subjects_teaching` ON(
        subjects_following.subID = subjects_teaching.subID
	)";
	
	
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$student[$cr]['Student_ID'] = $row['sID'];
			$student[$cr]['Name'] = $row['sName'];
			$student[$cr]['Gender'] = $row['Gender'];
			$student[$cr]['sGrade'] = $row['sGrade'];
			$student[$cr]['Grade'] = $row['Grade'];
			$student[$cr]['Contact'] = $row['sContact'];
			$student[$cr]['Parent_NIC'] = $row['sParentNIC'];
			$student[$cr]['Parent_contact'] = $row['pContact'];
			$student[$cr]['Parent_Name'] = $row['pName'];
			$student[$cr]['Subject_Name'] = $row['subName'];
			$student[$cr]['teacher_ID'] = $row['tNIC'];
			
			
			$cr++;
		}echo json_encode($student);
		
		
		
	}
	else{
		http_response_code(404);
	}
?>