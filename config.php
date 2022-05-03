<?php


$head_hostname = "localhost";
$head_user = "root";//change
$head_password = "pavan123";//
$head_database = "eventdb";//change
    ini_set('max_execution_time', 60);
	$dbConnection= $db = $bd = $con = mysqli_connect($head_hostname,$head_user,$head_password,$head_database);   //create connection

	if(mysqli_connect_errno())
	{
		echo "Failed to connect to database".mysqli_connect_error();
	}


?>