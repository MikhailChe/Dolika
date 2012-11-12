<?php
global $url;
global $mysql;
global $smarty;
require_once(ABS_PATH . "/classes/functions/SI.php");
require_once(ABS_PATH . "/classes/functions/electronics.php");
foreach($_POST AS $key=>$value){
	$_POST[$key] = preg_replace("/,/", ".", $_POST[$key]);
}
if(isset($_POST['N'])){
	$N = $_POST['N'];
}else{
	$N = "";
}
if($N!=""){
	$N = (int) fromSImetrik($N);
}
if(isset($_POST['I'])){
	$I = $_POST['I'];
}else{
	$I = "";
}
if($I!=""){
	$I = (double) fromSImetrik($I);
}
if(isset($_POST['U'])){
	$U = $_POST['U'];
}else{
	$U = "";
}
if($U!=""){
	$U = (double) fromSImetrik($U);
}
if(isset($_POST['V'])){
	$V = $_POST['V'];
}else{
	$V = "";
}
if($V!=""){
	$V = (double) fromSImetrik($V);
}

if(!isset($_POST['rowName'])){
	$_POST['rowName'] = '24';
}

$K = 0.75;
if($I>0 && $N>0 && $U>0 && $V>0){
	if($V < $U){
		$ERR = "Слишком слабый источник, надо с этим что-нибудь сделать";
	}elseif(($V-$U*$N) < 0){
		$ERR = "Слишком много диодов, надо оставить " . floor($V/$U) . " шт.";
	}elseif($V == $U){
		$ERR = "Сопротивление не понадобится";
	}else{
		//Для правильного сопротивления
		$R = ($V-$U*$N)/($I * $K);
		$W = ($I*$K)*($I*$K)*$R;
		
		//Минимально допустимое сопротивление
		$Ra = ($V-$U*$N)/($I);
		$Wa = $I * $I * $Ra;

		$Rr = getNearestTo($R, $_POST['rowName'], "up");
		$Wr = $I * $K *$I * $K * $Rr;
	}	
}else{
	$R = "";
	$W = "";
	$Ra = "";
	$Wa = "";
	$Rr = "";
	$Wr = "";
}

if($N!=""){
	$N = toSImetrik($N);
}

if($I!=""){
	$I = toSImetrik($I);
}

if($U!=""){
	$U = toSImetrik($U);
}

if($V!=""){
	$V = toSImetrik($V);
}

$R = toSImetrik($R);
$W = toSImetrik($W);
$Ra = toSImetrik($Ra);
$Wa = toSImetrik($Wa);
$Rr = toSImetrik($Rr);
$Wr = toSImetrik($Wr);

$smarty->assign('N', $N);
$smarty->assign('I', $I);
$smarty->assign('U', $U);
$smarty->assign('V', $V);
$smarty->assign('W', $W);
$smarty->assign('R', $R);
$smarty->assign('W', $W);
$smarty->assign('Ra', $Ra);
$smarty->assign('Wa', $Wa);
$smarty->assign('Rr', $Rr);
$smarty->assign('Wr', $Wr);
if(isset($ERR)){
	$smarty->assign('ERR', $ERR);
}else{
	$smarty->assign('ERR', "");
}
if(isset($_POST['rowName'])){
	$smarty->assign('rowName', $_POST['rowName']);
}else{
	$smarty->assign('rowName', "");
}
$smarty->assign('rowNames', getRowNames());

$hint = generateHintTable();

$smarty->assign("static", $mysql->result("SELECT * FROM `pages` WHERE `link` = '" . $url[count($url)-1] . "' LIMIT 0,1"));

$smarty->assign("hint", $hint);
$smarty->assign('module', 'diod/index');
?>