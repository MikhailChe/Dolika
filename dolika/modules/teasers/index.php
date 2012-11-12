<?php

$media = new media();
	switch($_POST['action']){
		case "weight_change":{
			if(isset($_POST['id']) && isset($_POST['weight']) && is_array($_POST['id']) && is_array($_POST['weight']) && count($_POST['id'])==count($_POST['weight'])){
				for($i=0; $i<count($_POST['id']); $i++){
					$mysql->query("UPDATE `teasers`
						SET `weight` = '" . $_POST['weight'][$i] . "'
						WHERE `id` = '" . $_POST['id'][$i] . "'");
				}
			}
			header("Location: " . SITE_URL . "/dolika/teasers/");
			break;
		}
		case "post":{
			if($_POST['display']!="yes"){
				$_POST['display'] = "no";
			}
			$mysql->query("INSERT INTO `teasers`
				SET `name` = '" . $_POST['name'] . "',
				`link` = '" . $_POST['link'] . "',
				`description` = '" . $_POST['description'] . "',
				`display` = '" . $_POST['display'] . "'");
			$new_id = $mysql->last_id;
			$media->teaser_post_image($_FILES['image']['tmp_name'], $new_id);
			header("Location: " . SITE_URL . "/dolika/teasers/" . $new_id);
			break;
		}
		case "edit":{
			if($_POST['display']!="yes"){
				$_POST['display'] = "no";
			}
			if(isset($_POST['delete']) && $_POST['delete'] == 'yes'){
				$media->teaser_delete_image($_GET['id']);
				$mysql->query("DELETE FROM `teasers` WHERE `id` = '" . $_POST['id'] . "'");
				header("Location: " . SITE_URL . "/dolika/teasers/");
				break;
			}
			$mysql->query("UPDATE `teasers`
				SET `name` = '" . $_POST['name'] . "',
				`link` = '" . $_POST['link'] . "',
				`description` = '" . $_POST['description'] . "',
				`display` = '" . $_POST['display'] . "'
				WHERE `id` = '" . $_POST['id'] . "'");
			$media->teaser_post_image($_FILES['image']['tmp_name'], $_POST['id']);
			header("Location: " . SITE_URL . "/dolika/teasers/" . $_POST['id']);
			break;
		}
	}
	
	if(isset($_GET['action']) && $_GET['action']){
		$media->teaser_delete_image($_GET['id']);
		header("Location: " . SITE_URL . "/dolika/teasers/" . $_GET['id']);
	}
	
	if($url[3] == ""){
		$teasers = $mysql->results("SELECT `id`, `name`, `weight` FROM `teasers` ORDER BY `weight` ASC, `id` ASC");
		$smarty->assign("module", "teasers/index");
	}elseif($url[3] == "add"){
		$smarty->assign("module", "teasers/add");
	}elseif(preg_match("/^[0-9]+$/", $url[3])){
		$teasers = $mysql->result("SELECT * FROM `teasers` WHERE `id` = '" . $url[3] . "'");
		
		$smarty->assign("module", "teasers/edit");
	}
	$smarty->assign('teasers', $teasers);
?>