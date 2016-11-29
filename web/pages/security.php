<?php
  include "basic_menu.php";
?>

<h1><?php etrans("security"); ?></h1>

<p><?php etrans("security_description"); ?></p>

<div id="switch_area">
	<h2><?php etrans("security_state"); ?></h2>
	<label class="switch security" id="security">
	    <input type="checkbox" class="security_switch" id="security_switch">
    	<div class="slider round" id="security"></div>
  </label>
  <script>
  	loadSecurity();
  </script>
</div>