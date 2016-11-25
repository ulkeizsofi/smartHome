<?php
  include "basic_menu.php";
?>
<div>
  <h1>Heating</h1>

  <label class="switch">
    <input type="checkbox" class="heating" id="heating">
    <div class="slider round" ></div>
  </label>

  <h1>Ventillation</h1>

  <label class="switch">
    <input type="checkbox" class="ventillation" id="ventillation">
    <div class="slider round" ></div>
  </label>

  <h1>Air-Conditioning</h1>

  <label class="switch">
    <input type="checkbox" class="ac" id="ac">
    <div class="slider round" ></div>
  </label>

</div>
<div>
  <h1>Temperature</h1>
   <div class="left">
     <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
</div>
</div>