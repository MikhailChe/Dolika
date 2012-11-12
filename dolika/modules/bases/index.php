<?php
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
			$mysql->query("INSERT INTO `bases` SET
				`id_owner` = '" . $_POST['id_topic'] . "',
				`type` = '" . $_POST['type'] . "',
				`task_beg` = '" . $_POST['task_beg'] . "',
				`task_end` = '" . $_POST['task_end'] . "',
				`display` = '" . $_POST['display'] . "'");
			$new_id = $mysql->last_id;
			
			//Фасетная часть
			if(isset($_POST['facet']) && is_array($_POST['facet'])){
				for($i=0; $i<count($_POST['facet']); $i++){
					$mysql->query("INSERT INTO `bases_facet` SET
						`id_owner` = '" . $_POST['id'] . "'
						`name` = '" . $_POST['facet'][$i] . "'");
				}
			}
			
			//Правильные ответы
			if(isset($_POST['correct_answers']) && is_array($_POST['correct_answers'])){
				for($i=0; $i<count($_POST['correct_answers']); $i++){
					$mysql->query("INSERT INTO `bases_answers` SET
						`id_owner` = '" . $_POST['id'] . "',
						`name` = '" . $_POST['correct_answers'][$i] . "'
						`correct` = 'yes'");
				}
			}
			//Неправильные ответы
			if(isset($_POST['incorrect_answers']) && is_array($_POST['incorrect_answers'])){
				for($i=0; $i<count($_POST['incorrect_answers']); $i++){
					$mysql->query("INSERT INTO `bases_answers` SET
						`id_owner` = '" . $_POST['id'] . "',
						`name` = '" . $_POST['incorrect_answers'][$i] . "'
						`correct` = 'no'");
				}
			}
			
			header("Location: " . SITE_URL . "/dolika/topics/" . $new_id);
		}	
	break;
	}
	case "edit" : {
		if( isset($_POST['name'], $_POST['id']) ){
			$mysql->query("UPDATE `bases` SET
				`type` = '" . $_POST['type'] . "',
				`task_beg` = '" . $_POST['task_beg'] . "',
				`task_end` = '" . $_POST['task_end'] . "',
				`display` = '" . $_POST['display'] . "'");
			
			//Фасетная часть
			if(isset($_POST['facet
			
			header("Location: " . SITE_URL . "/dolika/topics/" . $_POST['id']);
		}
	break;
	}
}

if($url[3] == ""){
	$topics = $mysql->results("SELECT `id, `name`, `weight` FROM `topics` ORDER BY `weight`");
	$smarty->assign("module", "topics/index");
}elseif($url[3] == "add"){
	$smarty->assign("module", "topics/add");
}elseif(preg_match("/^[0-9]+$/", $url[3])){
	$topics = $mysql->results("SELECT * FROM `topics` WHERE `id` = '" . $url[3] . "'");
	$smarty->assign("module", "topics/edit");
}

$smarty->assign("topics", $topics);
?>