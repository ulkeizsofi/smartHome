<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 0);

    $name = $_POST["name"];
    $state = $_POST["state"];
    if ($state == null){
    	$stt = 0;
    }
    else{
    	if ($state == "true"){
    		$stt = 1;
    	}
    	else{
    		$stt = 0;
    	}
    }
    $response = array();

    $response["status"] = "success";
    $data = array( "name" => $name,
    				"state" => $stt
    );


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
      CREATE TABLE IF NOT EXISTS LIGHTING_TB
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

   if ($data["name"] !== NULL){
   $sql =
      "INSERT OR REPLACE INTO LIGHTING_TB (NAME,STATE) "
      ." VALUES ('".$data["name"]."','".$data["state"]."' )";
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