<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	$response = array();
	$temperature = $_POST["temperature"];

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
   
   $sql =<<<EOF
      CREATE TABLE IF NOT EXISTS HVAC_TB
      (NAME           TEXT  PRIMARY KEY   NOT NULL,
      STATE        CHAR(50));
EOF;
	//check if success
	
	$ret = $db->exec($sql);
   if(!$ret){
      $response["status"] = "error";
      $response["reason"] = "cannot create table";
      echo json_encode($response);
      die();
   } 

   if ($temperature){
   $sql =
      "INSERT OR REPLACE INTO HVAC_TB (NAME,STATE) "
      ." VALUES ('temperature','".$temperature."' )";
  }
  else{
       $response["status"] = "error";
      $response["reason"] = "invalid data input";
      echo json_encode($response);
      die();
  }

  //echo $sql;

  $ret = $db->exec($sql);
   if(!$ret){
      $response["status"] = "error";
      $response["reason"] = "cannot insert in the table";
   } 
   $db->close();

	echo json_encode($response);

?>