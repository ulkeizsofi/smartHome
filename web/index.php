<?php
	@session_start();
	include "translate/logic.php";

?>

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
	<link rel="stylesheet" type="text/css" href="/css/login.css">
	<script>var crtLang = "<?php echo getCurrentLanguage(); ?>";</script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/hvac.js"></script>
	<script src="js/indoor_positioning.js"></script>
	<script src="js/security.js"></script>
	<script src="js/lighting.js"></script>
	<script src="js/main.js"></script>
	<script src="js/settings.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body load = "RefreshWhenLoad()">

	<div class="container">
	<?php
	 $page = $_GET["page"];
	 include "pages/$page.php";
	?>
	</div>

</body>
</html>