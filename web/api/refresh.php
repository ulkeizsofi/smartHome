<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	$ids = json_decode($_POST["data"]);
	$table_name = array_shift($ids);

	$response = array();
	$response["status"] = "success";
	// //open the database
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


	if ($ids[0] == "*"){
			$sql = "select * from ".$table_name;
			$ret = $db->query($sql);
			//print_r($ret);
			while ($row = $ret->fetchArray()) {
    			//var_dump($row["NAME"]);
				$response[$row["NAME"]] = $row["STATE"];
			}
	}
	else{
		foreach($ids as $id){  
		   	$sql = "select state from ".$table_name." where Name=\"".$id."\"";
		  	$ret = $db->querySingle($sql);

		   if($ret == NULL){
		      $response["status"] = "error";
		      $response["reason"] = $id." entry not found";
				echo json_encode($response);
				die();
		   } 
		   $response["$id"] = $ret;
		}
	}
   $db->close();
   //s$response["status"] = "error";

	echo json_encode($response);

?>
