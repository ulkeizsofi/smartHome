<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	$response = array();
	$name = $_POST["name"];
	$user = $_POST["email"];
	$pass = $_POST["password"];
	$cpass = $_POST["con_psw"];
	if($pass == $cpass) {
		$response["status"] = "success";
	}
	else {

		$response["status"] = "error";
		$response["reason"] = "Password not the same";
		echo json_encode($response);
		die();
	}

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
      CREATE TABLE IF NOT EXISTS USER
      (NAME           TEXT    NOT NULL,
      EMAIL CHAR(100) PRIMARY KEY     NOT NULL,
      PASSWORD        CHAR(50));
EOF;
	//check if success
	
	$ret = $db->exec($sql);
   if(!$ret){
      $response["status"] = "error";
      $response["reason"] = "cannot create table";
      echo json_encode($response);
      die();
   } 

   $sql =
      "INSERT INTO USER (NAME,EMAIL,PASSWORD) "
      ." VALUES ('$name','$user','$pass');";

  $ret = $db->exec($sql);
   if(!$ret){
      $response["status"] = "error";
      $response["reason"] = "cannot insert in the table";
   } 
   $db->close();

	echo json_encode($response);

?>