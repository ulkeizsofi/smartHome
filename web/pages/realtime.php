<head>
<script src="js/jquery.canvasjs.min.js"></script>
<script src="js/realtime.js"></script>
<script src="js/settings.js"></script>

<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.canvasjs.min.js"></script>

<link rel="stylesheet" type="text/css" href="/css/realtime.css">
</head>
<body>
<?php
	include "basic_menu.php"
?>
<h1><?php etrans("realtime"); ?></h1>
<p><?php etrans("realtime_description"); ?></p>
<div id="tempChart" class="temp" style=" width: 100%;"></div>
<script>
	createButtonTemp();
</script>

<div id="humidChart" class="humid" style=" width: 100%;"></div>
<script>
	createButtonHumid();
</script>

</body>