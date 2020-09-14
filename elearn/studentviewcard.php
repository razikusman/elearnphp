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
INNER JOIN `attendance` ON(
		student.sID = attendance.sID AND attendance.subID = subjects.subId
	)";
	
	
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$student[$cr]['Student_ID'] = $row['sID'];
			$student[$cr]['Name'] = $row['sName'];
			$student[$cr]['Gender'] = $row['Gender'];
			$student[$cr]['Grade'] = $row['sGrade'];
			$student[$cr]['Contact'] = $row['sContact'];
			$student[$cr]['Parent_NIC'] = $row['sParentNIC'];
			$student[$cr]['Parent_Name'] = $row['pName'];
			$student[$cr]['Subject_Name'] = $row['subName'];
			$student[$cr]['Subjectid'] = $row['subId'];
			$student[$cr]['atendance'] = $row['count'];
			$student[$cr]['month'] = $row['month'];
			
			
			$cr++;
		}echo json_encode($student);
		
		
		
	}
	else{
		http_response_code(404);
	}
?>