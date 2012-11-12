<?php
	global $url;
	global $mysql;
	global $smarty;
	global $url;
	
	// POST-EDIT часть модуля
	switch ($_POST['action']) {
		case "edit" : {
			if($_POST['move'] == 'close'){
				$status = ", `status` = 'closed' ";
			}elseif($_POST['move'] == 'unclose'){
				$status = ", `status` = 'unclosed' ";
			}
			$mysql->query("UPDATE `orders` SET
						  `parfume_comment` = '" . $_POST['parfume_comment'] . "'" . $status . "
						  WHERE `id` = '" . $_POST['id'] . "'");
			header("Location: " . SITE_URL . "/dolika/orders/" . $_POST['id']);
			break;
		}
	}
	//Вывод информации
	if ($url[3] == "" || $url[3] == "new") {
		$orders = $mysql->results("SELECT `orders`.`id`, `status`, `date` AS `date_order`, FROM_UNIXTIME(`date`, '%d.%m.%Y %H:%i') as `date`, `name`, `phone`
								FROM `orders`
								WHERE `status` = 'new'
								ORDER BY `date_order` DESC");
		if($orders != 0){
			for($i=0; $i<count($orders); $i++){
				//items_count, total
				list($count, $total) = $mysql->result("SELECT SUM(`orders_items`.`quantity`) AS `items_count`,
													 SUM(IF(`catalog`.`sale`='yes', `catalog`.`sale_price`*`orders_items`.`quantity`, `catalog`.`price`*`orders_items`.`quantity`)) AS `total`
													  FROM `orders_items`
													  INNER JOIN `catalog`
													  ON `catalog`.`id` = `orders_items`.`id_item`
													  WHERE `id_order` = '" . $orders[$i]['id'] . "'");
				$orders[$i]['items_count'] = ($count==NULL?0:$count);
				$orders[$i]['total'] = ($total==NULL?0:$count);
			}
		}
    	$smarty->assign('module', 'orders/index');
	}elseif($url[3] == "view"){
		$orders = $mysql->results("SELECT `orders`.`id`, `status`, `date` AS `date_order`, FROM_UNIXTIME(`date`, '%d.%m.%Y %H:%i') as `date`, `name`, `phone`
								FROM `orders`
								WHERE `status` = 'view'
								ORDER BY `date_order` DESC");
		if($orders != 0){
			for($i=0; $i<count($orders); $i++){
				//items_count, total
				list($count, $total) = $mysql->result("SELECT SUM(`orders_items`.`quantity`) AS `items_count`,
													 SUM(IF(`catalog`.`sale`='yes', `catalog`.`sale_price`*`orders_items`.`quantity`, `catalog`.`price`*`orders_items`.`quantity`)) AS `total`
													  FROM `orders_items`
													  INNER JOIN `catalog`
													  ON `catalog`.`id` = `orders_items`.`id_item`
													  WHERE `id_order` = '" . $orders[$i]['id'] . "'");
				$orders[$i]['items_count'] = ($count==NULL?0:$count);
				$orders[$i]['total'] = ($total==NULL?0:$count);
			}
		}
		$smarty->assign('module', 'orders/index');
	}elseif($url[3] == "closed"){
		$orders = $mysql->results("SELECT `orders`.`id`, `status`, `date` AS `date_order`, FROM_UNIXTIME(`date`, '%d.%m.%Y %H:%i') as `date`, `name`, `phone`
								FROM `orders`
								WHERE `status` = 'closed'
								ORDER BY `date_order` DESC");
		
		if($orders != 0){
			for($i=0; $i<count($orders); $i++){
				//items_count, total
				list($count, $total) = $mysql->result("SELECT SUM(`orders_items`.`quantity`) AS `items_count`,
													 SUM(IF(`catalog`.`sale`='yes', `catalog`.`sale_price`*`orders_items`.`quantity`, `catalog`.`price`*`orders_items`.`quantity`)) AS `total`
													  FROM `orders_items`
													  INNER JOIN `catalog`
													  ON `catalog`.`id` = `orders_items`.`id_item`
													  WHERE `id_order` = '" . $orders[$i]['id'] . "'");
				$orders[$i]['items_count'] = ($count==NULL?0:$count);
				$orders[$i]['total'] = ($total==NULL?0:$count);
			}
		}
		$smarty->assign('module', 'orders/index');
	}elseif($url[3] == "unclosed"){
		$orders = $mysql->results("SELECT `orders`.`id`, `status`, `date` AS `date_order`, FROM_UNIXTIME(`date`, '%d.%m.%Y %H:%i') as `date`, `name`, `phone`
								FROM `orders`
								WHERE `status` = 'unclosed'
								ORDER BY `date_order` DESC");
		if($orders != 0){
			for($i=0; $i<count($orders); $i++){
				//items_count, total
				list($count, $total) = $mysql->result("SELECT SUM(`orders_items`.`quantity`) AS `items_count`,
													 SUM(IF(`catalog`.`sale`='yes', `catalog`.`sale_price`*`orders_items`.`quantity`, `catalog`.`price`*`orders_items`.`quantity`)) AS `total`
													  FROM `orders_items`
													  INNER JOIN `catalog`
													  ON `catalog`.`id` = `orders_items`.`id_item`
													  WHERE `id_order` = '" . $orders[$i]['id'] . "'");
				$orders[$i]['items_count'] = ($count==NULL?0:$count);
				$orders[$i]['total'] = ($total==NULL?0:$count);
			}
		}
		$smarty->assign('module', 'orders/index');
	}elseif(preg_match("/[0-9]+/", $url[3])){
		$orders = $mysql->result("SELECT
					`id`,
					FROM_UNIXTIME(`date`, '%d.%m.%Y %H:%i') as `date`,
					`name`, `email`, `phone`, `address`,
					`comment`, `parfume_comment`, `status`
					FROM `orders`
					WHERE `id` = '" . $url[3] . "'");
		if($orders['status'] == "new"){
			$mysql->query("UPDATE `orders` SET `status` = 'view' WHERE `id` = '" . $url[3] . "'");
			$orders = $mysql->result("SELECT
						  `id`, `date`, `name`, `email`, `phone`, `address`,
						  `comment`, `parfume_comment`, `status`
						  FROM `orders`
						  WHERE `id` = '" . $url[3] . "'");
		}
		$items = $mysql->results("SELECT `catalog`.`id`,
					`catalog`.`name`,
					`orders_items`.`quantity`,
					`orders_items`.`price` AS `price`,
					`catalog`.`image_sml` AS `image`,
					CONCAT('/dolika/catalog/', `catalog`.`id`) AS `link`
					FROM `orders_items`
					INNER JOIN `catalog`
					ON `catalog`.`id` = `orders_items`.`id_item`
					WHERE `id_order` = '" . $url[3] . "'");
		
		$total = 0;
		for($i=0; $i<count($items); $i++){
			$total += $items[$i]['price'];
		}
		$orders['total'] = $total;
		
		$backlink = SITE_URL . "/dolika/orders/" . $orders['status'];
		$smarty->assign('module', 'orders/item');
	}
	$sub_nav = array();
	$sub_nav[] = array('name' => 'Новые', 'link' => ($url[3]==""||$url[3]=="new")?"":'/dolika/orders/', 'active' => ($url[3]==""||$url[3]=="new")?'yes':'no');
	$sub_nav[] = array('name' => 'Просмотренные', 'link' => ($url[3]=="view")?"":'/dolika/orders/view', 'active' => $url[3]=="view"?'yes':'no');
	$sub_nav[] = array('name' => 'Закрытые', 'link' => ($url[3]=="closed")?"":'/dolika/orders/closed', 'active' => $url[3]=="closed"?'yes':'no');
	$sub_nav[] = array('name' => 'Отмененные', 'link' => ($url[3]=="unclosed")?"":'/dolika/orders/unclosed', 'active' => $url[3]=="unclosed"?'yes':'no');

	$smarty->assign('orders', $orders);
	$smarty->assign('sub_nav', $sub_nav);
	$smarty->assign('items', $items);
	$smarty->assign('backlink', $backlink);
?>