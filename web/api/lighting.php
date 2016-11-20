<?php
console.log("begin");
$decoded = json_decode($_POST['data'],true);
console.log("dec " + decoded);
echo $decoded;
?>