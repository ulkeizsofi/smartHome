<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
  @session_start();

    $state = $_POST["state"];
    if ($state == null){
    	$stt = 1;
    }
    else{
    	if ($state == "false"){
    		die();
    	}
    	else{
    		$stt = 1;
    	}
    }
    $response = array();

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
      CREATE TABLE IF NOT EXISTS SECURITY_TB
      (ID   INTEGER NOT NULL,
      NAME           TEXT  PRIMARY KEY   NOT NULL,
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

   if ($stt != NULL){
   $sql =
      "INSERT OR REPLACE INTO SECURITY_TB (ID,NAME,STATE) "
      ." VALUES (".$_SESSION["usrID"].",'security','".$stt."' )";
 	 }
    else {
      $response["status"] = "error";
      $response["reason"] = "invalid data received";
      $response["data"] = $data;
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