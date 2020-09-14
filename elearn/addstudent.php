<?php 
	require 'connect.php'; //conection to database
	$postdata = file_get_contents("php://input"); //get the jason type data
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		
		
		//asign data to variables
		$sirname = mysqli_real_escape_string($con, trim($request -> sirname));
		$givenname = mysqli_real_escape_string($con, trim($request -> givenname));
		$grade = mysqli_real_escape_string($con, trim($request -> grad));
		$DOB = mysqli_real_escape_string($con, trim($request -> DOB));
		$pContact = mysqli_real_escape_string($con, (int)($request -> pContact));
		$user = mysqli_real_escape_string($con, trim($request -> user));
		$pName = mysqli_real_escape_string($con, trim($request -> gurdname));
		$pNIC = mysqli_real_escape_string($con, trim($request -> gurdNIC));
		$userid = mysqli_real_escape_string($con, (int)($request -> userid));
		$password = mysqli_real_escape_string($con, trim($request -> password));


		//add to user table from student form
		$sql1 = "INSERT INTO user( uType,uID,uPassword ) VALUES('Parent','{$pNIC}',null ),('{$user}','{$userid}','{$password}' )"; 
		
		if(mysqli_query($con,$sql1))
		{
			http_response_code(201);
		}
		
		else
		{
			$sql2 = "INSERT INTO user( uType,uID,uPassword ) VALUES ('{$user}','{$userid}','{$password}' )"; 
		
			if(mysqli_query($con,$sql2))
			{
				http_response_code(201);
			}
		
			$sql3 = "INSERT INTO student( sID,sirName,givenName,sGrade,sDOB,sContact,sParentNIC) VALUES( '{$userid}','{$sirname}','{$givenname}','{$grade}','{$DOB}','{$pContact}','{$pNIC}')";
		
			if(mysqli_query($con,$sql3))
			{
				http_response_code(201);
				
			}
		}
		
		
		
		//add parent detail from student form to parent table
		$sql4 = "INSERT INTO parent( NIC,pName,pContact ) VALUES( '{$pNIC}','{$pName}','{$pContact}')";
					
		if(mysqli_query($con,$sql4))
		{
			http_response_code(201);
		}

					
		//add to student table from student form
		$sql5 = "INSERT INTO student( sID,sirName,givenName,sGrade,sDOB,sContact,sParentNIC) VALUES( '{$userid}','{$sirname}','{$givenname}','{$grade}','{$DOB}','{$pContact}','{$pNIC}')";
		
		if(mysqli_query($con,$sql5))
		{
			http_response_code(201);
			
		}
		
	}
	
	
	/*add to subjectfollowing table
		$sql3 = "INSERT INTO student( sID,sName,sGrade,sDOB,sParentNIC,sContact ) VALUES( '{$userid}','{$name}','{$grade}','{$DOB}','{$pNIC}','{$pContact}' )";
		
		if(mysqli_query($con,$sql3))
		{
			http_response_code(201);
		}*/
		
		
		/*$sub=file_get_contents("http://localhost/elearn/addsubjects.php");
		if(isset($sub) && !empty($sub)){
		//$subreq = json_decode($sub);                           //this is for testing
		$englsh = ($sub.$english);
		}*/
		
		/*
		//add Student detail from student form to user table
		$sql = "INSERT INTO user( uType,uID,uPassword ) VALUES ('{$user}','{$userid}','{$password}' )";
		if(mysqli_query($con,$sql))
		{
			http_response_code(201);
		}
		
		//add parent detail from student form to user table
		$sql1 = "INSERT INTO user( uType,uID,uPassword ) VALUES('Parent','{$pNIC}',null )
			WHERE NOT EXISTS(
				SELECT uID FROM user WHERE uID != '$pNIC'
			) LIMIT 1"; 
		
		if(mysqli_query($con,$sql1))
		{
			http_response_code(201);
		}
		
		
		
		//add parent detail from student form to parent table
		$sql3 = "INSERT INTO parent( NIC,pName,pContact ) VALUES( '{$pNIC}','{$pName}','{$pContact}'))
			WHERE NOT EXISTS(
				SELECT NIC FROM parent WHERE NIC != '$pNIC'
			) LIMIT 1"; 
					
		if(mysqli_query($con,$sql3))
		{
			http_response_code(201);
		}
		*/
		
		
?>