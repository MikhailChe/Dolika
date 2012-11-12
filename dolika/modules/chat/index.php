<?php
if(isset($_POST['action'])){
	switch($_POST['action']){
		case "weight_change" :{
		break;
		}
		case "post" :{
		break;
		}
		case "edit" :{
			if(isset($_POST['delete']) && $_POST['delete'] == 'yes'){
				$mysql->query("DELETE FROM `messages` WHERE `id` = '" . $_POST['id'] . "'");
				header("Location: " . SITE_URL . "/dolika/chat");
			break;
			}
			$mysql->query("UPDATE `messages` SET
				`text` = '" . htmlspecialchars($_POST['text']) . "'
				WHERE `id` = '" . $_POST['id'] . "'");
			header("Location: " . SITE_URL . "/dolika/chat/" . $_POST['id'] );
		break;
		}
	}
}

if(preg_match("@^[0-9]+$@", $url[3])){
	$messages = $mysql->result("SELECT *, FROM_UNIXTIME(`time`, '%d.%m.%Y %h:%i:%s') AS `date` FROM `messages` WHERE `id` = '" . $url[3] . "'");
	$smarty->assign('module', 'chat/edit');
}elseif($url[3]=="add"){
}elseif($url[3]==""){
	$messages = $mysql->results("SELECT `id`, `time` AS `date_order`, FROM_UNIXTIME(`time`, '%d.%m.%Y %h:%i:%s') AS `date`, `text` AS `name` FROM `messages` ORDER BY `date_order` DESC, `id` DESC LIMIT 0,30");
	echo mysql_error();
	$smarty->assign('module', 'chat/index');
}

$smarty->assign('chat', $messages);
?>