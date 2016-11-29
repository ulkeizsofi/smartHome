<?php
  include "basic_menu.php";
?>

<div id="lighting-window" >
<div>

	<h1><?php etrans("lighting"); ?></h1>
	<p>
		<?php etrans("lighting_description"); ?>
	</p>
</div>
<div id="switch_area">
	<table>
		<tbody >

		</tbody>
	</table>
</div>
<script>
    loadLighting();
</script>
<div>
	<button type="button" class="btn btn-primary" id="add-button"><?php etrans("add_switch"); ?></button>
</div>
</div>