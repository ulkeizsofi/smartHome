<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

    $name = $_POST["name"];
    $min = $_POST["min"];
    $max = $_POST["max"];
    $low = $_POST["low"];
    $high = $_POST["high"];
    $value = $_POST["value"];

    $response = array();

    $response["status"] = "success";
    $data = array( "name" => $name,
    				"min" => $min,
            "max" => $max,
            "low" => $low,
            "high" => $high,
            "value" => $value
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
      CREATE TABLE IF NOT EXISTS LEAK_DETECTION_TB
      (NAME           TEXT  PRIMARY KEY   NOT NULL,
      MIN        CHAR(50)    NOT NULL,
      MAX        CHAR(50)    NOT NULL,
      LOW        CHAR(50)    NOT NULL,
      HIGH        CHAR(50)    NOT NULL,
      VALUE        CHAR(50)    NOT NULL);
EOF;
	//check if success
	
	$ret = $db->exec($sql);
   if(!$ret){
      $response["status"] = "error";
      $response["reason"] = "cannot create table";
      echo json_encode($response);
      die();
   } 

   if ($data["name"] != NULL){
   $sql =
      "INSERT OR REPLACE INTO LEAK_DETECTION_TB (NAME,MIN, MAX, LOW, HIGH, VALUE) "
      ." VALUES ('".$data["name"]."','".$data["min"]."','".$data["max"]."', '".$data["low"]."', '".$data["high"]."', '".$data["value"]."' )";
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