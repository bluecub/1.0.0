<?php 

require "includes/basicFunctions.php";
$new = 8;
echo is_object($new) ? "yes" : "no";
$new = new basicFunctions();
echo is_object($new);

?>