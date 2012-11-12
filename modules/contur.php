<?php
global $smarty;
require_once(ABS_PATH . "/classes/functions/SI.php");
require_once(ABS_PATH . "/classes/functions/electronics.php");
foreach($_POST AS $key=>$value){
	$_POST[$key] = preg_replace("/,/", ".", $_POST[$key]);
}
$F = $_POST['F'];
$F = trim($F);
if($F!=""){
	$F = fromSImetrik($F);
}
$R = $_POST['R'];
$R = trim($R);
if($R!=""){
	$R = fromSImetrik($R);
}

$C = $_POST['C'];
$C = trim($C);
if($C != ""){
	$C = fromSImetrik($C);
}
echo $C;
if($F == "" && $R > 0  && $C > 0){
	$F = 1 / (2 * pi() * $R * $C);
}elseif($R == "" && $F > 0  && $C > 0){
	$R = 1 / (2 * pi() * $F * $C);
}elseif($C == "" && $F > 0  && $R > 0){
	$C = 1 / (2 * pi() * $F * $R);
}

if($F!=""){
	$F = toSImetrik($F);
}
if($R!=""){
	$R = toSImetrik($R);
}
if($C != ""){
	$C = toSImetrik($C);
}


$smarty->assign('F', $F);
$smarty->assign('R', $R);
$smarty->assign('C', $C);

$hint = generateHintTable();
$smarty->assign("hint", $hint);
$smarty->assign('module', "contur/index");
?>