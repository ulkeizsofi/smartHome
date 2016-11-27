<?php
  include "basic_menu.php";
?>

<h1><?php etrans("security"); ?></h1>

<p><?php etrans("security_description"); ?></p>

<div id="switch_area">
	<h2><?php etrans("security_state"); ?></h2>
	<label class="switch">
    <input type="checkbox" class="security" id="security">
    <div class="slider round" ></div>
  </label>
  <script>
  	loadSecurity();
  </script>
</div>