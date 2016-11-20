<head>
	<link rel="stylesheet" type="text/css" href="/css/leak_detection.css">
	<script src="js/leak_detection.js"></script>
</head>
<body>
<?php
  include "basic_menu.php";
?>

<h1>Leak Detection</h1>
<p>You can easily add a sensor and detect it's value.<br/></p>

<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">New sensor</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      		<form class="form-horizontal" name="new_sens_form">
      <div class="panel-body">
  <div class="form-group">
    <label class="control-label col-sm-4" for="name">Sensor name:</label>
    <div class="col-sm-8">
    <input type="name" class="form-control " id="name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="min">Min value:</label>
    <div class="col-sm-8">
    <input type="min" class="form-control" id="min">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="max">Max value:</label>
    <div class="col-sm-8">
    <input type="max" class="form-control" id="max">
  	</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="low">Low threshold:</label>
    <div class="col-sm-8">
    <input type="low" class="form-control" id="low">
  	</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="high">High threshold:</label>
    <div class="col-sm-8">
    <input type="high" class="form-control" id="high">
    </div>
  </div>
      </div>
      <div class="panel-footer">
  <button type="button" class="btn btn-primary sensor" id="submit-sensor">Submit</button>
  </div>
</form>
    </div>
  </div>
</div>

<div id="progress-bar-area">
	
</div>