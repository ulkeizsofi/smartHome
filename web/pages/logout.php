<?php
	session_start();
   // echo $_SESSION["usrID"];
    $_SESSION = array();
    header("Location: http://contrall.home/index.php?page=login");
?>