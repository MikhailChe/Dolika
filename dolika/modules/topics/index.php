<?php /*русо*/
switch($_POST['action']){
	case "weight_change" : {
		if(is_array($_POST['weight']) && is_array($_POST['id']) && count($_POST['weight']) == count($_POST['id'])){
			for($i=0; $i<count($_POST['weight']); $i++){
				$mysql->query("UPDATE `topics` SET `weight` = '" . $_POST['weight'][$i] . "' WHERE `id` = '" . $_POST['id'][$i] . "'");
			}
		}
	break;
	}
	case "post" : {
		if(isset($_POST['name'])){
			$mysql->query("INSERT INTO `topics` SET
				`id_owner` = '" . $_SESSION['id_owner'] . "',
				`name` = '" . $_POST['name'] . "',
				`description` = '" . $_POST['description'] . "',
				`display` = '" . $_POST['display'] . "'");
			$new_id = $mysql->last_id;
			header("Location: " . SITE_URL . "/dolika/topics/" . $new_id);
		}	
	break;
	}
	case "edit" : {
		if( isset($_POST['name'], $_POST['id']) ){
			$mysql->query("UPDATE `topics` SET
				`name` = '" . $_POST['name'] . "',
				`description` = '" . $_POST['description'] . "',
				`display` = '" . $_POST['display'] . "'
				WHERE `id` = '" . $_POST['id'] . "'");
			header("Location: " . SITE_URL . "/dolika/topics/" . $_POST['id']);
		}
	break;
	}
}

if($url[3] == ""){
	$topics = $mysql->results("SELECT `id, `name`, `weight` FROM `topics` WHERE `id_owner` = '" . $_SESSION['id_owner'] . "' ORDER BY `weight`");
	$smarty->assign("module", "topics/index");
}elseif($url[3] == "add"){
	$smarty->assign("module", "topics/add");
}elseif(preg_match("/^[0-9]+$/", $url[3])){
	$topics = $mysql->results("SELECT * FROM `topics` WHERE `id` = '" . $url[3] . "' AND `id_owner` = '" . $_SESSION['id_owner'] . "'");
	$smarty->assign("module", "topics/edit");
}

$smarty->assign("topics", $topics);
?>