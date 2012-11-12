<?php
if(isset($_POST['action'])){
	switch($_POST['action']){
		case "weight_change" :{
			for($i=0; $i<count($_POST['id']); $i++){
				$mysql->query("UPDATE `pages` SET `weight` = '" . $_POST['weight'][$i] . "' WHERE `id` = '" . $_POST['id'][$i] . "'");
			}
			header("Location: " . SITE_URL . "/dolika/static/");
		break;
		}
		case "post" :{
		break;
		}
		case "edit" :{
			if(isset($_POST['delete']) && $_POST['delete'] == 'yes'){
			break;
			}
			if($_POST['display']!='yes'){
				$_POST['display'] = 'no';
			}
			$mysql->query("UPDATE `pages` SET
				`name` = '" . $_POST['name'] . "',
				`title` = '" . $_POST['title'] . "',
				`meta_description` = '" . $_POST['meta_description'] . "',
				`body` = '" . $_POST['body'] . "',
				`display` = '" . $_POST['display'] . "'
				WHERE `id` = '" . $_POST['id'] . "'");
			header("Location: " . SITE_URL . "/dolika/static/" . $_POST['id'] );
		break;
		}
	}
}

if(preg_match("@^[0-9]+$@", $url[3])){
	$static = $mysql->result("SELECT * FROM `pages` WHERE `id` = '" . $url[3] . "'");
	$smarty->assign('module', 'static/edit');
}elseif($url[3]=="add"){
}elseif($url[3]==""){
	$static = array();
	$static_0 = $mysql->results("SELECT `id`, `weight`, `name`, '0' AS `depth` FROM `pages` WHERE `id_owner` = '0' ORDER BY `weight`, `id`");
	if($static_0!=false && $static_0!=0 && count($static_0)>0){
		for($i=0; $i<count($static_0); $i++){
			$static[] = $static_0[$i];
			$static_1 = $mysql->results("SELECT `id`, `weight`, `name`, '1' AS `depth` FROM `pages` WHERE `id_owner` = '" . $static_0[$i]['id'] . "' ORDER BY `weight`, `id`");
			if($static_1!=false && $static_1!=0 && count($static_1)>0){
				$static = array_merge($static, $static_1);
			}
		}
	}
	
	$smarty->assign('module', 'static/index');
}

$smarty->assign('static', $static);
?>