<?php
	require 'connect.php'; 
	
	
	$data = $_GET['data'];
	$out=str_split($data);
	$d1= array_slice($out,0,4);
	$d2= array_slice($out,4);
	$stuid = implode("",$d1);
	$subid = implode("",$d2);

    echo($subid);


	$sql = "INSERT INTO permisin (subjectID,sID,Permision) VALUES ('{$subid}','{$stuid}','allow')";


	if(mysqli_query($con,$sql))
	{
		http_response_code(204);
	}
	else{
		http_response_code(404);
	}
?>