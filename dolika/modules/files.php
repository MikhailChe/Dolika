<?php /*русо*/
	$media = new media();

	switch($_POST['action']){
		case "add" :{
			if(isset($_FILES['file'])){
				$media->post_file($_FILES['file']['tmp_name'], $_FILES['file']['name'], $_POST['description']);
				header("Location: /dolika/files/");
			}
		break;
		}
	}
	
	if($_GET['action']=='delete_file'){
		$media->delete_file($_GET['id']);
	}
	
	if($url[3]==""){
		$files = $mysql->results("SELECT `id`, `name`, `link`, `size`, `description`,
			`time` AS `time_order`,
			FROM_UNIXTIME(`time`, '%d.%m.%Y %h.%i') AS `time`
			FROM `files`
			ORDER BY `time_order`");
		if($files!=false){
			require_once(ABS_PATH . "/classes/functions/SI.php");
			for($i=0; $i<count($files); $i++){
				$files[$i]['size'] = toSImetrik(round($files[$i]['size'], -3)) . "b";
				$files[$i]['icon'] = $media->exttoicon($files[$i]['link']);
			}
		}
		
		$smarty->assign("module", "files/index");
	}elseif($url[3]=="add"){
		$smarty->assign("module", "files/add");
	}
	
	$smarty->assign("files", $files);
?>