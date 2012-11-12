<?php
global $url;
global $mysql;
global $smarty;
require_once(ABS_PATH . "/classes/functions/SI.php");
require_once(ABS_PATH . "/classes/functions/electronics.php");
$R = $_POST['R'];
if($R != "" && $_POST['rowName']){
	$Rr = fromSImetrik($R);
	$Rr = getNearestTo($Rr, $_POST['rowName']);
	$Rr = toSImetrik($Rr);
}
$R = fromSImetrik($R);
$R = toSImetrik($R);
$smarty->assign('R', $R);
$smarty->assign('Rr', $Rr);
$smarty->assign('rowName', $_POST['rowName']);
$smarty->assign('rowNames', getRowNames());

$hint = generateHintTable();
$smarty->assign("hint", $hint);
$smarty->assign('module', 'nearres/index');
?>