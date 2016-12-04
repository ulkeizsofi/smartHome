<?php
@session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 0);
	@session_start();
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
			$sql = "select * from ".$table_name." where ID = ".$_SESSION["usrID"]." order by name asc";
			$ret = $db->query($sql);
			if ($ret){
	    		if ($table_name == "leak_detection_tb"){
					while ($row = $ret->fetchArray()) {
		    				$list = array(
		    						"MIN" => $row["MIN"],
		    						"MAX" => $row["MAX"],
		    						"LOW" => $row["LOW"],
		    						"HIGH" => $row["HIGH"],
									"VALUE" => $row["VALUE"]

		    					); 
		    				$response[$row["NAME"]] = $list;
	    				
	    			}
	    		}
	    		else{
					while ($row = $ret->fetchArray()) {
						$response[$row["NAME"]] = $row["STATE"];
					}
				}
			}
	}
	else{
		$ret = 1;
		foreach($ids as $id){  
		   	$sql = "select state from ".$table_name." where Name=\"".$id."\" and ID = ".$_SESSION["usrID"];
		  	$ret = $db->querySingle($sql);
		  	console.log("ret" + $ret);
		   if($ret == NULL){
		      $response["$id"] = "0";
		     }		   
		    else{

		   		$response["$id"] = $ret;
		    } 
		
		}
	}
   $db->close();
  

	echo json_encode($response);

?>
