<div id="menu_container">
	<div id="menuSidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="index.php?page=home"><?php etrans("home"); ?></a>
		  <a href="index.php?page=hvac"><?php etrans("hvac"); ?></a>
		  <a href="index.php?page=lighting"><?php etrans("lighting"); ?></a>
		  <a href="index.php?page=security"><?php etrans("security"); ?></a>
		  <a href="index.php?page=leak_detection"><?php etrans("leak_detection"); ?></a>
		  <a href="index.php?page=indoor_positioning"><?php etrans("indoor_positioning"); ?></a>
		  <a href="index.php?page=realtime"><?php etrans("realtime"); ?></a>
		  <a href="index.php?page=logout"><?php etrans("settings_sign_out"); ?></a>
	</div>

	<div class="main">
	  <span onclick="openNav()">&#9776; </span>

	  	<div class="lang">
		  	<div class="ro" onclick="languageChanged('ro')"> </div>
		  	<div class="en" onclick="languageChanged('en')"> </div>
	  	</div>
	</div>
</div>