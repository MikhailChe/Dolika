<?php
//русо
//error_reporting(0);

#CONFIG
require_once("../classes/config.php");
#SMARTY
require_once("./smarty.php");

#dolika & site
require_once(ABS_PATH . "/classes/site.php");

$dolika = new dolika();
$mysql->debug();
$dolika->display();
?>