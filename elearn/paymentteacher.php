<?php 
	require 'connect.php'; //conection to database
	$postdata = file_get_contents("php://input"); //get the jason type data
	if(isset($postdata) && !empty($postdata))
	{
		$request=json_decode($postdata);//breake json data in to string array
		
		
		//asign data to variables
		$id = mysqli_real_escape_string($con, trim($request -> id));
		$year = mysqli_real_escape_string($con, trim($request -> yeartoday));
		$month = mysqli_real_escape_string($con, trim($request -> monthtoday));
		$date = mysqli_real_escape_string($con, trim($request -> datetoday));
		$salary = mysqli_real_escape_string($con, trim($request -> salary));
		//$status = mysqli_real_escape_string($con, trim($request -> paid));
		
		/*$user = mysqli_real_escape_string($con, trim($request -> user));
		$pName = mysqli_real_escape_string($con, trim($request -> gurdname));
		$pNIC = mysqli_real_escape_string($con, trim($request -> gurdNIC));
		$userid = mysqli_real_escape_string($con, (int)($request -> userid));
		$password = mysqli_real_escape_string($con, trim($request -> password));
		*/


		//add to payment table from payment form
		$sql1 = "INSERT INTO `salrypayments`(`tNIC`,year, `month`, `date`, `amount`, `status`) VALUES ('{$id}','{$year}','{$month}','{$date}','{$salary}','paid' )"; 
		
		if(mysqli_query($con,$sql1))
		{
			http_response_code(201);
		}
	}
?>