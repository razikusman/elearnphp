<?php
require 'connect.php';
$data = $_GET['data'];//get the data
//$data = '1234-56789-01';
$out=str_split($data);
$d2= array_slice($out,9);
$d1= array_slice($out,0,9);
$month = implode("",$d2);echo print_r($month);
$stid = implode("",$d1);echo print_r($stid);

//$sql1 = "select tNIC,date from salrypayments where  
//$sql = "DELETE FROM salrypayments WHERE tNIC = {$tNIC} AND date = {$date}";
$sql = "DELETE FROM `payments` WHERE `sID`= {$stid} AND `month` = {$month}";

if(mysqli_query($con,$sql))
{
	http_response_code(204);
}
else{
	http_response_code(404);
}


?>