<?php
	global $url;
	global $mysql;
	global $smarty;

	$media = new media();

	
	$tag_0_id = $mysql->result("SELECT `catalog_tags`.`id`
									FROM `catalog_tags`
									WHERE `link` = '" . $url[3] . "'
									AND `id_owner` = '0'
									LIMIT 0,1");
	$sub_nav = $mysql->results("SELECT `id`, `name`,
									  IF(`link` = '" . $url[3] . "', '', CONCAT('" . SITE_URL . "/dolika/catalog/',`link`)) AS `link`,
									  IF(`link` = '" . $url[3] . "', 'yes', 'no') AS `active`
									  FROM `catalog_tags`
									  WHERE `id_owner` = '0'
									  ORDER BY `weight`, `id`");
	
		
	$backlink = parse_url($_SERVER['REQUEST_URI']);
	$backlink = $backlink['path'];
	$backexplode = explode("/", $backling);
	if($backexplode[2]!=$url[2]){
		$backlink = $sub_nav[0]['link'];
	}

	// POST-EDIT часть модуля
	switch ($_POST['action']) {
		case "weight_change" : {
			for($i=0; $i<count($_POST['id']); $i++){
				$mysql->query("UPDATE `catalog` SET `weight` = '" . $_POST['weight'][$i] . "' WHERE `id` = '" . $_POST['id'][$i] . "'");
			}
			header("Location: " . $_SERVER['HTTP_REFERER'] );
			break;
		}
		case "post" : {
			if($_POST['sale']!="yes"){$_POST['sale']="no";}
			if($_POST['display']!="yes"){$_POST['display']="no";}
			$mysql->query("INSERT INTO `catalog`
						  (`name`, `producer`, `country`, `announce`, `description`, `price`, `sale_price`, `sale`, `display`)
						  VALUES (
						  '" . $_POST['name'] . "',
						  '" . $_POST['producer'] . "',
						  '" . $_POST['country'] . "',
						  '" . $_POST['announce'] . "',
						  '" . $_POST['description'] . "',
						  '" . $_POST['price'] . "',
						  '" . $_POST['sale_price'] . "',
						  '" . $_POST['sale'] . "',
						  '" . $_POST['display'] . "'
						  )");
			$item_id = $mysql->last_id;
			//Работаем с тэгами. Сначала проверим существование и является ли он глубоким
			$tag = $mysql->result("SELECT `id`, `id_owner` FROM `catalog_tags` WHERE `id` = '" . $_POST['id_tag'] . "'");
			if($tag == 0){
				//Не существует, берём самый первый
				$tag = $mysql->result("SELECT `id`, `id_owner` FROM `catalog_tags` WHERE `id_owner` <> 0 ORDER BY `weight` ASC, `id` ASC LIMIT 0,1");
				$mysql->query("DELETE FROM `catalog_tags_corr` WHERE `id_item` = '" . $item_id . "'");
				$mysql->query("INSERT INTO `catalog_tags_corr` (`id_item`, `id_tag`) VALUES
							  ('" . $item_id . "', '" . $tag['id'] . "'),
							  ('" . $item_id . "', '" . $tag['id_owner'] . "')");
			}else{
				if($tag['id_owner'] == 0){
					//Оказался не глубоким
					$tag = $mysql->result("SELECT `id`, `id_owner` FROM `catalog_tags` WHERE `id_owner` = '" . $tag['id'] . "' ORDER BY `weight` ASC, `id` ASC LIMIT 0,1");
					$mysql->query("DELETE FROM `catalog_tags_corr` WHERE `id_item` = '" . $item_id . "'");
					$mysql->query("INSERT INTO `catalog_tags_corr` (`id_item`, `id_tag`) VALUES
							  ('" . $item_id . "', '" . $tag['id'] . "'),
							  ('" . $item_id . "', '" . $tag['id_owner'] . "')");
				}else{
					//Нормальный тэг
					$mysql->query("DELETE FROM `catalog_tags_corr` WHERE `id_item` = '" . $item_id . "'");
					$mysql->query("INSERT INTO `catalog_tags_corr` (`id_item`, `id_tag`) VALUES
							  ('" . $item_id . "', '" . $tag['id'] . "'),
							  ('" . $item_id . "', '" . $tag['id_owner'] . "')");
				}
			}
			if(isset($_FILES['images'])){
				for($i=0; $i<count($_FILES['images']['tmp_name']); $i++){
					$media->catalog_post_image($_FILES['images']['tmp_name'][$i], $item_id);
				}
			}
			header("Location: " . SITE_URL . "/dolika/catalog/" . $item_id);
			break;
		}
		case "edit" : {
			if(isset($_POST['delete']) && $_POST['delete'] = 'yes'){
				$media->catalog_delete_image_byowner($_POST['id']);
				$mysql->query("DELETE FROM `catalog` WHERE `id` = '" . $_POST['id'] . "'");
				header("Location: " . SITE_URL . "/dolika/catalog/");
				break;
			}
			if($_POST['sale']!="yes"){$_POST['sale']="no";}
			if($_POST['display']!="yes"){$_POST['display']="no";}
			$mysql->query("UPDATE `catalog`
						  SET
						  `name` = '" . $_POST['name'] . "',
						  `producer` = '" . $_POST['producer'] . "',
						  `country` = '" . $_POST['country'] . "',
						  `announce` = '" . $_POST['announce'] . "',
						  `description` = '" . $_POST['description'] . "',
						  `price` = '" . $_POST['price'] . "',
						  `sale_price` = '" . $_POST['sale_price'] . "',
						  `sale` = '" . $_POST['sale'] . "',
						  `display` = '" . $_POST['display'] . "'
						  WHERE `id` = '" . $_POST['id'] . "'
						  ");
			$item_id = $_POST['id'];
			//Работаем с тэгами. Сначала проверим существование и является ли он глубоким
			$tag = $mysql->result("SELECT `id`, `id_owner` FROM `catalog_tags` WHERE `id` = '" . $_POST['id_tag'] . "'");
			if($tag == 0){
				//Не существует, берём самый первый
				$tag = $mysql->result("SELECT `id`, `id_owner` FROM `catalog_tags` WHERE `id_owner` <> 0 ORDER BY `weight` ASC, `id` ASC LIMIT 0,1");
				$mysql->query("DELETE FROM `catalog_tags_corr` WHERE `id_item` = '" . $item_id . "'");
				$mysql->query("INSERT INTO `catalog_tags_corr` (`id_item`, `id_tag`) VALUES
							  ('" . $item_id . "', '" . $tag['id'] . "'),
							  ('" . $item_id . "', '" . $tag['id_owner'] . "')");
			}else{
				if($tag['id_owner'] == 0){
					//Оказался не глубоким
					$tag = $mysql->result("SELECT `id`, `id_owner` FROM `catalog_tags` WHERE `id_owner` = '" . $tag['id'] . "' ORDER BY `weight` ASC, `id` ASC LIMIT 0,1");
					$mysql->query("DELETE FROM `catalog_tags_corr` WHERE `id_item` = '" . $item_id . "'");
					$mysql->query("INSERT INTO `catalog_tags_corr` (`id_item`, `id_tag`) VALUES
							  ('" . $item_id . "', '" . $tag['id'] . "'),
							  ('" . $item_id . "', '" . $tag['id_owner'] . "')");
				}else{
					//Нормальный тэг
					$mysql->query("DELETE FROM `catalog_tags_corr` WHERE `id_item` = '" . $item_id . "'");
					$mysql->query("INSERT INTO `catalog_tags_corr` (`id_item`, `id_tag`) VALUES
							  ('" . $item_id . "', '" . $tag['id'] . "'),
							  ('" . $item_id . "', '" . $tag['id_owner'] . "')");
				}
			}
			if(isset($_FILES['images'])){
				for($i=0; $i<count($_FILES['images']['tmp_name']); $i++){
					$media->catalog_post_image($_FILES['images']['tmp_name'][$i], $item_id);
				}
			}
			header("Location: " . SITE_URL . "/dolika/catalog/" . $_POST['id']);
			break;		
		}
	}

	if($_GET['action']=="image_delete"){
		$media->catalog_delete_image($_GET['id']);
		header("Location: " . SITE_URL . "/dolika/catalog/" . $_GET['id_owner']);
	}

	//Вывод информации
	if (preg_match("/[0-9]+/", $url[3])) {
		$catalog = $mysql->result("SELECT *
								  FROM `catalog`
								  WHERE `id` = '" . $url[3] . "'
								  LIMIT 0,1");
		$images = $mysql->results("SELECT `id`, `id_owner`, `image_sml`, `image_big` FROM `catalog_images` WHERE `id_owner` = '" . $url[3] . "'");
		$catalog['images'] = $images;
		$tags = $mysql->result("SELECT `catalog_tags`.`id`,
								   `catalog_tags`.`id_owner`
								   FROM `catalog_tags`
								   INNER JOIN `catalog_tags_corr`
								   ON `catalog_tags_corr`.`id_tag` = `catalog_tags`.`id`
								   WHERE `catalog_tags_corr`.`id_item` = '" . $catalog['id'] . "'
								   AND `catalog_tags`.`id_owner`<> '0'");
		$catalog['id_tag'] = $tags['id'];
		
		// Теги		
		$tags = array();
		$tags_0 = $mysql->results("SELECT `id`, `id_owner`, '0' AS `depth`, `name` FROM `catalog_tags` WHERE `id_owner` = '0' ORDER BY `weight` ASC");
		for($i=0; $i<count($tags_0); $i++){
			$tags[] = $tags_0[$i];
			$tags_1 = $mysql->results("SELECT `id`, `id_owner`, '1' AS `depth`, `name` FROM `catalog_tags` WHERE `id_owner` = '" . $tags_0[$i]['id'] . "' ORDER BY `weight` ASC");
			if($tags_1!=0 && count($tags_1)>0){
				$tags = array_merge($tags, $tags_1);
			}
		}
		//print_r($tags);
    	$smarty->assign('module', 'catalog/edit');
  	}elseif ($url[3] == "add") {
		// Теги		
		$tags = array();
		$tags_0 = $mysql->results("SELECT `id`, `id_owner`, '0' AS `depth`, `name` FROM `catalog_tags` WHERE `id_owner` = '0' ORDER BY `weight` ASC");
		for($i=0; $i<count($tags_0); $i++){
			$tags[] = $tags_0[$i];
			$tags_1 = $mysql->results("SELECT `id`, `id_owner`, '1' AS `depth`, `name` FROM `catalog_tags` WHERE `id_owner` = '" . $tags_0[$i]['id'] . "' ORDER BY `weight` ASC");
			if($tags_1!=0 && count($tags_1)>0){
				$tags = array_merge($tags, $tags_1);
			}
		}
    	$smarty->assign('module', 'catalog/add');
	}else{
		$curcat = $mysql->result("SELECT `id`, `link` FROM `catalog_tags` WHERE `id_owner` = '0' AND `link` = '" . $url[3] . "'");
		
		if($curcat!=0){
			$catalog = $mysql->results("SELECT `catalog`.`id`, `name`, `weight`, `price`,
				(SELECT `catalog_tags`.`id` FROM `catalog_tags`
				INNER JOIN `catalog_tags_corr`
				ON `catalog_tags`.`id` = `catalog_tags_corr`.`id_tag`
				WHERE `catalog_tags`.`id_owner` <> '0'
				AND `catalog_tags_corr`.`id_item` = `catalog`.`id`
				) AS `id_order`
				FROM `catalog`
				INNER JOIN `catalog_tags_corr`
				ON `catalog_tags_corr`.`id_item` = `catalog`.`id`
				WHERE `catalog_tags_corr`.`id_tag` = '" . $curcat['id'] . "'
				ORDER BY `id_order` ASC,
				`catalog`.`weight` ASC,
				`catalog`.`id` ASC");
			
		}else{
			$catalog = $mysql->results("SELECT `id`, `name`, `weight`, `price` FROM `catalog` ORDER BY `catalog`.`weight` ASC, `catalog`.`id` ASC");
		}
		$smarty->assign('module', 'catalog/index');
	}

	$smarty->assign('catalog', $catalog);
	$smarty->assign('tags', $tags);
	$smarty->assign('sub_nav', $sub_nav);
	$smarty->assign('backlink', $backlink);
?>
