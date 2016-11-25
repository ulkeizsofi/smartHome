<?php
@session_start();
$langToSet = $_GET["langToSet"];
$_SESSION["crtLang"] = $langToSet;
$response = array("status" => "success");
echo json_encode($response);