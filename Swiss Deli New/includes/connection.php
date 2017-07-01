<?php 
	
	// 1. Create a database connection
	
	//Define as constant since they will not be varry
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "swiss_delidb");
	
	/*
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="widget_corp";
	*/
	$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

	//test if connection succeeded
	if(mysqli_connect_errno()){
		die("database connection failed: " . mysqli_connect_error()." (" . mysqli_connect_errno() . ")");
	}else{
		//echo "success";
	}
?>