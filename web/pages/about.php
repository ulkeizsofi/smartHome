<head>
		<script src="js/security.js"></script>
		<script src="js/about.js"></script>
<link rel="stylesheet" type="text/css" href="/css/about.css">

</head>
<body>
	
<div class = "about_container">
	<span class="lang">
		  	<div class="ro" onclick="languageChanged('ro')"> </div>
		  	<div class="en" onclick="languageChanged('en')"> </div>
	  	</span>
	<h1><br/><br/>ContrAll Home</h1>
	<p><br/><br/><br/><br/><?php etrans("about_description"); ?></p>
	<div class="sign-up">
    	<button class="btn primary-btn" id="log-in"><?php etrans("signup"); ?></button>
	</div>
</div>
</body>