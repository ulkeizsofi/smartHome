<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$response = array();
	$user = $_POST["email"];
	$password = $_POST["password"];

	$response["status"] = "success";
	
	//open the database
	class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('home.db');
      }
   }


   $db = new MyDB();
   if(!$db){
      $response["status"] = "error";
		$response["reason"] = "DB not  opened";
		echo json_encode($response);
		die();
   } else {
      //echo "Opened database successfully\n";
   }	
   
   $sql = "SELECT * from USER";
  	$ret = $db->exec($sql);
   if(!$ret){
      $response["status"] = "error";
      $response["reason"] = "user not found";
		echo json_encode($response);
		die();
   } 

   $db->close();

	echo json_encode($response);
?>