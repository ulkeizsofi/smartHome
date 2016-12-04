<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
   @session_start();
	$response = array();

	$name = $_POST["name"];
	$table_name = $_POST["table_name"];

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

   $sql ="DELETE FROM ".$table_name." WHERE NAME = \"".$name."\" AND ID = ".$_SESSION["usrID"];
   //echo $sql;

	//check if success
	
	$ret = $db->exec($sql);
   if(!$ret){
      $response["status"] = "error";
      $response["reason"] = "cannot delete from the table";
      echo json_encode($response);
      die();
   } 

   $db->close();
   echo json_encode($response);
?>