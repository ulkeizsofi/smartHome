<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	$response = array();

	$switch = $_POST["switch"];
	$state = $_POST["state"] == "true"?1:0;
   $data = array("switch" => $switch, "state" => $state);

   $lang = array("welcome" => array("ro" => "Salut!", "en" => "Welcome!"));
   $crtLang = "en";
   function translate($id) {
      return $lang[$id][$crtLang];
   }


   // echo json_encode(array("state" => $state));

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

   if ($data["switch"] && $data["state"] !== NULL){
   $sql =
      "INSERT OR REPLACE INTO HVAC_TB (NAME,STATE) "
      ." VALUES ('".$data["switch"]."','".$data["state"]."' )";
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