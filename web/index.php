<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/basic.css">
	<link rel="stylesheet" type="text/css" href="/css/home.css">
	<link rel="stylesheet" type="text/css" href="/css/hvac.css">
	<link rel="stylesheet" type="text/css" href="/css/thermo.css">
	<link rel="stylesheet" type="text/css" href="/css/lighting.css">
	<link rel="stylesheet" type="text/css" href="/css/indoor_positioning.css">
	
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/hvac.js"></script>
	<script src="js/indoor_positioning.js"></script>
	<script src="js/security.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	
	<div class="container">
	<?php
	 $page = $_GET["page"];
	 include "pages/$page.php";
	?>
	</div>

</body>
</html>