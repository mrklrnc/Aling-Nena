<?php
	$host = "localhost"; 
    $port = "3306"; 
    $user = "root"; 
    $pass = ""; 
    $db = "online_retail"; 

	date_default_timezone_set('Asia/Manila');

    $con = mysqli_connect($host, $user, $pass, $db, $port);


    if (mysqli_connect_errno()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
?>