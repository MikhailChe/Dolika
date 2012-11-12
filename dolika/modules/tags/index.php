<?php
	global $smarty;
	global $url;
	global $mysql;
	
	// POST-EDIT часть модуля
	switch ($_POST['action']) {
		case 'post' : {
			if ($_POST['display'] != "yes") {$_POST['display'] = "no";}
			$mysql->query("INSERT INTO `catalog_tags` (
					`id_owner`, `name`, `link`, `title`, `description`, `display`
				) VALUES (
					'" . $_POST['id_owner'] . "',
					'" . $_POST['name'] . "',
					'" . $_POST['link'] . "',
					'" . $_POST['title'] . "',
					'" . $_POST['description'] . "',
					'" . $_POST['display'] . "')");

			header("Location: " . SITE_URL . "/dolika/tags/" . $mysql->last_id);
       		break;
		}
		case 'edit' : {
			if (isset($_POST['delete'])) {
				// Получить и удалить все вложенные теги
				$tags = $mysql->results("SELECT `id` FROM `catalog_tags` WHERE `id_owner` = '" . $_POST['id'] . "' ORDER BY `id` ASC");

				if ($tags != 0) {
					for ($i=0;$i<count($tags);$i++) {
						$mysql->query("DELETE FROM `catalog_tags_corr` WHERE `id_tag` = '" . $tags[$i]['id'] . "'");
						$mysql->query("DELETE FROM `catalog_tags` WHERE `id` = '" . $tags[$i]['id'] . "'");
					}
				}

				$mysql->query("DELETE FROM `catalog_tags_corr` WHERE `id_tag` = '" . $_POST['id'] . "'");
				$mysql->query("DELETE FROM `catalog_tags` WHERE `id` = '" . $_POST['id'] . "'");
				header("Location: " . SITE_URL . "/dolika/tags");
				break;
			}

			if ($_POST['display'] != "yes") {$_POST['display'] = "no";}
			$mysql->query("UPDATE `catalog_tags` SET
				      `id_owner` = '" . $_POST['id_owner'] . "',
				      `name` = '" . $_POST['name'] . "',
				      `link` = '" . $_POST['link'] . "',
				      `title` = '" . $_POST['title'] . "',
				      `description` = '" . $_POST['description'] . "',
				      `display` = '" . $_POST['display'] . "'
				      WHERE `id` = '" . $_POST['id'] . "'");

			header("Location: " . SITE_URL . "/dolika/tags/" . $_POST['id']);
			break;
		}
		case 'weight_change' : {
			for ($i=0;$i<count($_POST['id']);$i++) {
				$mysql->query("UPDATE `catalog_tags` SET `weight` = '" . $_POST['weight'][$i] . "' WHERE `id` = '" . $_POST['id'][$i] . "'");
			}

			header("Location: " . SITE_URL . "/dolika/tags/");
			break;
		}
	}

	if ($url[3] == '') {
		$tags = array();

		$tags_0 = $mysql->results("SELECT `id`, `weight`, '0' AS `depth`, `name` FROM `catalog_tags` WHERE `id_owner` = '0' ORDER BY `weight` ASC");
		if($tags_0 != 0){
			for ($i=0;$i<count($tags_0);$i++) {
				$tags_1 = $mysql->results("SELECT `id`, `weight`, '1' AS `depth`, `name` FROM `catalog_tags` WHERE `id_owner` = '" . $tags_0[$i]['id'] . "' ORDER BY `weight` ASC");
				$tags [] = $tags_0[$i];
				if ($tags_1 != 0) {
					for ($j=0;$j<count($tags_1);$j++) {
						$tags [] = $tags_1[$j];
					}
				}
			}
		}

		$smarty->assign('tags', $tags);
		$smarty->assign('module', 'tags/index');
	}
	elseif ($url[3] == 'add') {
		$id_owner = array();
		$id_owner = array_merge($id_owner, $mysql->results("SELECT `id`, '0' AS `depth`, `name` FROM `catalog_tags` WHERE `id_owner` = '0' ORDER BY `weight` ASC"));
		$smarty->assign('id_owner', $id_owner);

		$smarty->assign('module', 'tags/add');
	}
	elseif (preg_match('/^[0-9]+$/', $url[3])) {
		$tags = $mysql->result("SELECT * FROM `catalog_tags` WHERE `id` = '" . $url[3] . "' LIMIT 0,1");

		$linked_tags = $mysql->result("SELECT COUNT(`id`) AS `count` FROM `catalog_tags` WHERE `id_owner` = '" . $url[3] . "'");
		$linked_catalog = $mysql->result("SELECT COUNT(`catalog_tags_corr`.`id`) AS `count`
			FROM `catalog`
			INNER JOIN `catalog_tags_corr`
			ON `catalog`.`id` = `catalog_tags_corr`.`id_item`
			WHERE `catalog_tags_corr`.`id_tag` = '" . $url[3] . "'");
		
		if((!$linked_tags & $lined_tags['count']>0)||(!$linked_catalog & $linked_catalog['count']>0)){
			unset($id_owner);
		}else{	
			$id_owner = $mysql->results("SELECT `id`, '0' AS `depth`, `name` FROM `catalog_tags` WHERE `id_owner` = '0' AND `id` <> '" . $url[3] . "' ORDER BY `weight` ASC");
		}
		
		$smarty->assign('id_owner', $id_owner);

		$smarty->assign('module', 'tags/edit');
	}
	
	$smarty->assign('tags', $tags);
?>