<?php 
	require 'connect.php';
	
	$subjects = [];
	
	//////////////////
	
	$sql1 = "SELECT * FROM `subjects`
INNER JOIN `subjects_teaching` ON(
        subjects_teaching.subID = subjects.subId
    )
INNER JOIN `teacher` ON(
        teacher.NIC = subjects_teaching.tNIC
    )";
	if($result = mysqli_query($con,$sql1))
	{
		$cr = 0;
		while($row = mysqli_fetch_assoc($result)){
			$subjects[$cr]['Sub_ID'] = $row['subId'];
			$subjects[$cr]['Name'] = $row['subName'];
			$subjects[$cr]['amount'] = $row['amount'];
			$subjects[$cr]['Grade'] = $row['Grade'];
			$subjects[$cr]['teacher_Name'] = $row['tName'];
			$subjects[$cr]['NIC'] = $row['tNIC'];
			$cr++;
		}echo json_encode($subjects);
			
	}
	else{
		http_response_code(404);
	}
	
?>