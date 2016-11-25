<?php
  include "basic_menu.php";
?>


<div>
  <h1>Settings<br/><br/><h1>
</div>

<div>
  <h2>Select Language<h2>
</div>

<div class="language">
  <select class="selectpicker" data-width="fit">
      <option 
      data-content='<span class="flag-icon flag-icon-us"></span> English' 
      value='en'
      >English</option>
      <option  
      data-content='<span class="flag-icon flag-icon-mx"></span> Español' 
      value='ro'
      >Romanian</option>
  </select>
</div>

<div>
  <h2>Sign out<h2>
</div>

<div class="sign-out">
    <button class="btn primary-btn" id="log-out">Sign out</button>
</div>