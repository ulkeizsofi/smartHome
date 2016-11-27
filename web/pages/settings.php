<?php
  include "basic_menu.php";
?>


<div>
  <h1><?php etrans("settings"); ?><br/><br/><h1>
</div>

<div>
  <h2><?php etrans("settings_language"); ?><h2>
</div>

<div class="language">
  <select class="selectpicker" data-width="fit">
      <option 
      data-content='<span class="flag-icon flag-icon-us"></span> English' 
      value='en'
      >English</option>
      <option  
      data-content='<span class="flag-icon flag-icon-mx"></span> Romanian' 
      value='ro'
      >Romanian</option>
  </select>
</div>

<div>
  <h2><?php etrans("settings_sign_out"); ?><h2>
</div>

<div class="sign-out">
    <button class="btn primary-btn" id="log-out"><?php etrans("settings_sign_out"); ?></button>
</div>