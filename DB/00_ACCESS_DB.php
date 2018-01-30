<?php

function getDB(){
	//-----------------------------------//
	//
	// THIS FUNCTION CONNECTS TO THE DB
	//
	//-----------------------------------//
	$user='lega4mori'; 
	$password='';
	$db='my_lega4mori';
	if($_SERVER['SERVER_NAME']=='localhost'){
		$user='root';
		$password = 'ducati748';
		$db='fantacarrier';
	}
	$host='localhost';
	$con=mysqli_connect($host,$user,$password,$db);
	return $con;
}


function closeDB($con){
	mysql_close($con);
}


?>
