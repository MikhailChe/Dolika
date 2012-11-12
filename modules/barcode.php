<?php
function number_to_code($code, $number){
	$output = "";
	if($number=="0"){
		if($code=="L"){
			$output = "0001101";
		}elseif($code=="G"){
			$output = "0100111";
		}elseif($code=="R"){
			$output = "1110010";
		}
	}elseif($number=="1"){
		if($code=="L"){
			$output = "0011001";
		}elseif($code=="G"){
			$output = "0110011";
		}elseif($code=="R"){
			$output = "1100110";
		}
	}elseif($number=="2"){
		if($code=="L"){
			$output = "0010011";
		}elseif($code=="G"){
			$output = "0011011";
		}elseif($code=="R"){
			$output = "1101100";
		}
	}elseif($number=="3"){
		if($code=="L"){
			$output = "0111101";
		}elseif($code=="G"){
			$output = "0100001";
		}elseif($code=="R"){
			$output = "1000010";
		}
	}elseif($number=="4"){
		if($code=="L"){
			$output = "0100011";
		}elseif($code=="G"){
			$output = "0011101";
		}elseif($code=="R"){
			$output = "1011100";
		}
	}elseif($number=="5"){
		if($code=="L"){
			$output = "0110001";
		}elseif($code=="G"){
			$output = "0111001";
		}elseif($code=="R"){
			$output = "1001110";
		}
	}elseif($number=="6"){
		if($code=="L"){
			$output = "0101111";
		}elseif($code=="G"){
			$output = "0000101";
		}elseif($code=="R"){
			$output = "1010000";
		}
	}elseif($number=="7"){
		if($code=="L"){
			$output = "0111011";
		}elseif($code=="G"){
			$output = "0010001";
		}elseif($code=="R"){
			$output = "1000100";
		}
	}elseif($number=="8"){
		if($code=="L"){
			$output = "0110111";
		}elseif($code=="G"){
			$output = "0001001";
		}elseif($code=="R"){
			$output = "1001000";
		}
	}elseif($number=="9"){
		if($code=="L"){
			$output = "0001011";
		}elseif($code=="G"){
			$output = "0010111";
		}elseif($code=="R"){
			$output = "1110100";
		}
	}else{
		if($code=="L"){
			$output = "0001101";
		}elseif($code=="G"){
			$output = "0100111";
		}elseif($code=="R"){
			$output = "1110010";
		}else{
			$output = "0000000";
		}
	}
	return $output;
}

function encode_right($right_part){
	if(strlen($right_part)!=6){
		return;
	}
	$output = "";
	for($i=0; $i<strlen($right_part); $i++){
		$output .= number_to_code("R", $right_part[$i]);
	}
	return $output;
}

function encode_left($first_number, $left_part){
	if(strlen($left_part)!=6 || strlen($first_number)!=1){
		return;
	}
	$output = "";
	$combo = "";
	switch($first_number){
		case "0":{
			$combo = "LLLLLL";
			break;
		}
		case "1":{
			$combo = "LLGLGG";
			break;
		}
		case "2":{
			$combo = "LLGGLG";
			break;
		}
		case "3":{
			$combo = "LLGGGL";
			break;
		}
		case "4":{
			$combo = "LGLLGG";
			break;
		}
		case "5":{
			$combo = "LGGLLG";
			break;
		}
		case "6":{
			$combo = "LGGGLL";
			break;
		}
		case "7":{
			$combo = "LGLGLG";
			break;
		}
		case "8":{
			$combo = "LGLGGL";
			break;
		}
		case "9":{
			$combo = "LGGLGL";
			break;
		}
		default: {
			$combo = "LLLLLL";
		}
	}
	for($i=0; $i<strlen($combo); $i++){
		$output .= number_to_code($combo[$i], $left_part[$i]);
	}
	return $output;
}
function house(){
	return "101";
}
function middle_house(){
	return "01010";
}
function checksum($initval){
	$output = "";
	$summ = 0;
	$weight = 1;
	for($i=0; $i<strlen($initval); $i++){
		$summ += $initval[$i] * $weight;
		if($weight==1){
			$weight=3;
		}else{
			$weight=1;
		}
	}
	$summ %= 10;
	if($summ!=0){
		$summ = 10 - $summ;
	}
	$output = "" . $summ;
	return $output;
}
function prepare_get($name){
	if(!isset($_POST[$name])){
		$_POST[$name]="123456789012";
	}else{
		if(strlen($_POST['code'])<12){
			while(strlen($_POST['code'])<12){
				$_POST[$name] .= "0";
			}
		}else{
			$_POST[$name] = substr($_POST[$name], 0, 12);
		}
	}
	
	$_POST[$name] .= checksum($_POST[$name]);
	
}
prepare_get('code');
$init_val = $_POST['code'];
$left_part = substr($init_val, 1,6);
$right_part = substr($init_val, 7, 6);
$first_number = substr($init_val, 0, 1);
$output = house() . encode_left($first_number, $left_part) . middle_house() . encode_right($right_part) . house();

$smarty->assign('code', $_POST['code']);
$smarty->assign('output', $output);
$smarty->assign('module', 'barcode/index');
?>