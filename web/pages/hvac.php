<?php
  include "basic_menu.php";
?>
<div id="hvac-window">
  
<div>
  <h1><?php etrans("heating"); ?></h1>

  <label class="switch hvac_switch" id="hvac">
    <input type="checkbox" class="heating hvac" id="heating">
    <div class="slider round" ></div>
  </label>

  <h1><?php etrans("ventillation"); ?></h1>

  <label class="switch hvac_switch">
    <input type="checkbox" class="ventillation hvac" id="ventillation">
    <div class="slider round" ></div>
  </label>

  <h1><?php etrans("ac"); ?></h1>

  <label class="switch hvac_switch">
    <input type="checkbox" class="ac hvac" id="ac">
    <div class="slider round" ></div>
  </label>

</div>
<div>
  <h1><?php etrans("temperature"); ?></h1>
   <div class="left">
     <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" id="temperature" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
</div>
</div>
<script>
loadHvac();
</script>
</div>