<?php
global $url;
global $mysql;
global $page;
global $nav;
global $smarty;


function strippedDate($timestamp){
	if( date("Y") > date("Y", $timestamp) ){
		$format = "Y.";
	}
	if(( date("n") > date("n", $timestamp)) || ( date("Y") > date("Y", $timestamp) )){
		$format = "n." . $format;
	}

	if(( date("j") > date("j", $timestamp) )||( date("n") > date("n", $timestamp)) || ( date("Y") > date("Y", $timestamp) )){
		$format .= "j\&\\n\b\s\p;";
	}

	if((date("G") != date("G", $timestamp))||( date("j") > date("j", $timestamp) )||( date("n") > date("n", $timestamp)) || ( date("Y") > date("Y", $timestamp))){
		$format .= "G:";
	}

	if(( date("i") > date("i", $timestamp) )||(date("G") != date("G", $timestamp))||( date("j") > date("j", $timestamp) )||( date("n") > date("n", $timestamp)) || ( date("Y") > date("Y", $timestamp))){
		$format .= "i:";
	}
	
	$format .= "s";
	
	return date($format, $timestamp);
}

function myconv(&$input){
	$input = @iconv("cp866", "utf-8", $input);
}

function colfromid($id){
	$color = substr($id, strlen($id)-6, 6);
	return $color;
}
function colfromunix($time){
	$time *= 10;
	$red = abs(($time % 512) - 256);
	$time /= 16;
	$green = abs(($time % 512) - 256);
	$time /= 16;
	$blue = abs(($time % 512) - 256);

	$red = ( $red / 2 );// + (256 - (256 / 3));
	$green = ( $green / 2 );// + (256 - (256 / 3));
	$blue = ( $blue / 2 );// + (256 - (256 / 3));

	$red = $red<0?0:($red>255?255:$red);
	$green = $green<0?0:($green>255?255:$green);
	$blue = $blue<0?0:($blue>255?255:$blue);

	$color = dechex($red) . dechex($green) . dechex($blue);

	return $color;
}

function antiMAT($text){
	$init_mat_array = array('бля', 'хуй', 'хуя', 'хуе', 'пизда', 'ебат', 'ебал', 'пидор', 'педр', 'уеба', 'уебо');
	$additional_array = array();
	$mat_word = array('/б\s{0,}л\s{0,}я/', '/х\s{0,}у\s{0,}й/', '/х\s{0,}у\s{0,}я/', '/х\s{0,}у\s{0,}е/', '/п\s{0,}и\s{0,}з\s{0,}д/', '/е\s{0,}б\s{0,}а\s{0,}т/', '/е\s{0,}б\s{0,}а\s{0,}л/', '/п\s{0,}и\s{0,}д\s{0,}о\s{0,}р/', '/п\s{0,}е\s{0,}д\s{0,}р/', '/у\s{0,}е\s{0,}б\s{0,}а/', '/у\s{0,}е\s{0,}б\s{0,}о/');
	$mat_replace = array('***', '***', '***', '***', '****', '****', '****', '*****', '****', '****', '****');
	return preg_replace($mat_word, $mat_replace, $text);
}

function renew(){
	global $mysql;
	$olds = $mysql->results("SELECT `id`, `text` FROM `messages`");
	for($i=0; $i<count($olds); $i++){
		$text = $olds[$i]['text'];
		$id = $olds[$i]['id'];
		$text = antiMAT($text);
		$mysql->query("UPDATE `messages` SET `text` = '" . $text . "' WHERE `id` = '" . $id . "'");
	}
}

if(isset($_POST['action']) && $_POST['action'] == 'post'){
	var_export($_POST);
	if(trim($_POST['text'])==""){
		$_POST['text'] = trim($_POST['text']);
	}
	$ML = 50;
	$_POST['text'] = antiMAT($_POST['text']);
	if($_POST['text']!=""){
		if(mb_substr($_POST['text'], 0, 6, "UTF-8") == "!nick "){
			$_SESSION['nick'] = htmlspecialchars(mb_substr($_POST['text'], 6, 6, "UTF-8"), ENT_QUOTES) . ": ";
		}elseif(mb_strlen($_POST['text'], "UTF-8")<=$ML){
			$text = htmlspecialchars($_POST['text'], ENT_QUOTES);

			$mysql->query("INSERT INTO `messages`
							(`time`, `text`, `uid`, `ip`, `agent`, `nick`)
							VALUES (
							UNIX_TIMESTAMP(), '" . $_SESSION['nick'] . $text . "',
							'" . session_id() . "', '" . $_SERVER['REMOTE_ADDR'] . "',
							'" . $_SERVER['HTTP_USER_AGENT'] . "',
							'" . mb_substr($_SESSION['nick'], 0, mb_strlen( $_SESSION['nick'], "UTF-8" )-2, "UTF-8") . "'
							)");
			if($_POST['text']=="ping"){
				$mysql->query("INSERT INTO `messages` (`time`, `text`) VALUES (UNIX_TIMESTAMP(), 'pong')");
			}elseif(substr($_POST['text'],0,4) == "ping"){
				if($IP = $mysql->result("SELECT `ip` FROM `messages` WHERE `nick` = '" . mb_substr( $_POST['text'], 5, mb_strlen( $_POST['text'], "UTF-8") -5, "UTF-8") . "' ORDER BY `id` DESC LIMIT 1")){				
					$last = exec("ping -n 2 " . $IP['ip'], $output);
					array_walk_recursive($output, "myconv");
					$pong = array();
					for($i=0; $i<count($output); $i++){
						$output[$i] = trim($output[$i]);
						if($output[$i]!=""){
						$pong[] = $output[$i];
						}
					}
					//$mysql->query("INSERT INTO `messages` (`time`, `text`) VALUES (UNIX_TIMESTAMP(), '" . $last . "')");
					for($i=0; $i<count($pong); $i++){
						$mysql->query("INSERT INTO `messages` (`time`, `text`) VALUES (UNIX_TIMESTAMP(), '" . $pong[$i] . "')");
					}
				}elseif(strpos($_POST['text'], " ",5)==FALSE && strpos($_POST['text'], " -t")==FALSE && strpos($_POST['text'], " -n")==FALSE && strpos($_POST['text'], " -l")==FALSE){
					exec($_POST['text'] . " -n 2", $output);
					array_walk_recursive($output, "myconv");
					$pong = array();
					for($i=0; $i<count($output); $i++){
						$output[$i] = trim($output[$i]);
						if($output[$i]!=""){
						$pong[] = $output[$i];
						}
					}
					for($i=0; $i<count($pong); $i++){
						$mysql->query("INSERT INTO `messages` (`time`, `text`) VALUES (UNIX_TIMESTAMP(), '" . $pong[$i] . "')");
					}
				}
			}elseif(strtolower($_POST['text']) == "ayt"){
				$mysql->query("INSERT INTO `messages` (`time`, `text`) VALUES (UNIX_TIMESTAMP(), 'IAH')");
			}
		}else{
			if(isset($_SESSION['nick']) && mb_substr($_POST['text'], 0, 6, "UTF-8") != "!nick "){
				$_POST['text'] = $_SESSION['nick'] . $_POST['text'];
			}
			for($i=0; $i<ceil(mb_strlen($_POST['text'], "UTF-8")/$ML); $i++){
				$mysql->query("INSERT INTO `messages` (`time`, `text`, `uid`, `ip`, `agent`) VALUES (UNIX_TIMESTAMP(), '" . htmlspecialchars(mb_substr($_POST['text'], $i* $ML, $ML, "UTF-8"), ENT_QUOTES) . "', '" . session_id() . "', '" . $_SERVER['REMOTE_ADDR'] . "', '" . $_SERVER['HTTP_USER_AGENT'] . "')");
			}
		}

	}
	die();
}

$chatcount = $mysql->result("SELECT COUNT(*) AS `count` FROM `messages`");
$limit = ($chatcount['count']>=35?35:$chatcount['count']);
if($limit == ""){$limit = 0;}
$limitfrom = $chatcount['count'] -$limit;
$chat = $mysql->results("SELECT * , `time` AS `time_order` FROM `messages` ORDER BY `time_order` ASC, `id` ASC LIMIT " . $limitfrom. ", ". $limit);
if(is_array($chat)){
	for($i=0; $i<count($chat); $i++){
		$chat[$i]['text'] = preg_replace("/  /", " &nbsp;", $chat[$i]['text']);
		if($chat[$i]['text'][0] == " "){
			$chat[$i]['text'] = "&nbsp;" . mb_substr($chat[$i]['text'], 1);
		}
		$chat[$i]['colorFromId'] = colfromid($chat[$i]['uid']);
		$chat[$i]['colorFromUnix'] = colfromunix($chat[$i]['time']);
		$chat[$i]['time'] = strippedDate($chat[$i]['time']);
	}
}

$smarty->assign('chat', $chat);
$smarty->assign('module', "chat/index");
?>