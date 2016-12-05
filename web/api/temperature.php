<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
  @session_start();
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
      (ID   INTEGER   NOT NULL,
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

   if ($temperature){
    $sql = "SELECT * FROM HVAC_TB WHERE ID=".$_SESSION["usrID"]." AND NAME='temperature'";
    //echo $sql;
    $ret = $db->exec($sql);
    if(!$ret){
      //echo "RET" + $ret;

   $sql =
      "INSERT INTO HVAC_TB (ID,NAME,STATE) "
      ." VALUES (".$_SESSION["usrID"].",'temperature','".$temperature."' )";
      //echo "insert";
    }
    else{
      $sql =
      " UPDATE HVAC_TB set STATE= ".$temperature." WHERE ID = ".$_SESSION["usrID"]." AND NAME = 'temperature'";
      //echo $sql;
    }
    $ret = $db->exec($sql);
    if(!$ret){
      $response["status"] = "error";
      $response["reason"] = "cannot insert or replace";
      echo json_encode($response);
      die();
    }
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