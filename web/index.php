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
	<link rel="stylesheet" type="text/css" href="/css/login.css">
	

	<script>var crtLang = "<?php echo getCurrentLanguage(); ?>";</script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/settings.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<div class="container">
		<?php
			if(!isset($_SESSION["usrID"])){
				$page = $_GET["page"];
				if ($page == "about")
					include "pages/$page.php";
				else{
					$page = "login";
					include "pages/$page.php";
				}
			}
			else{
				 $page = $_GET["page"];
				 include "pages/$page.php";
			}
		?>
	</div>

</body>
</html>