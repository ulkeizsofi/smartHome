<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

   var temp = $_POST["temperature"];
   echo "Got it " + temp;
   
// 	$response = array();
// 	$temp = $_POST["temperature"];

// 	//open the database
// 	class MyDB extends SQLite3
//    {
//       function __construct()
//       {
//          $this->open('home.db');
//       }
//    }


//    $db = new MyDB();
//    if(!$db){
//       $response["status"] = "error";
// 		$response["reason"] = "DB not  opened";
// 		echo json_encode($response);
// 		die();
//    } else {
//       //echo "Opened database successfully\n";
//    }	
   
//    $sql =<<<EOF
//       CREATE TABLE IF NOT EXISTS HVAC
//       (NAME           TEXT  PRIMARY KEY   NOT NULL,
//       ADDED BOOLEAN  NOT NULL,
//       STATE        CHAR(50));
// EOF;
// 	//check if success
	
// 	$ret = $db->exec($sql);
//    if(!$ret){
//       $response["status"] = "error";
//       $response["reason"] = "cannot create table";
//       echo json_encode($response);
//       die();
//    } 

//    if (!$temp){
//    $sql =
//       "INSERT INTO HVAC (NAME,ADDED,STATE) "
//       ." VALUES ('temperature','true','$temp')";
//   }

//   $ret = $db->exec($sql);
//    if(!$ret){
//       $response["status"] = "error";
//       $response["reason"] = "cannot insert in the table";
//    } 
//    $db->close();

// 	echo json_encode($response);

?>