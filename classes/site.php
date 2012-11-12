<?php
class site extends dolika {
	function general_navigation(){
		global $mysql;
		global $smarty;
		global $url;
		$nav = $mysql->results("SELECT * , IF(`link` = '" . $url[1] . "', 'yes', 'no') AS `active` FROM `pages` WHERE `type` = 'general' AND `id_owner` = '0' AND `display` = 'yes' ORDER BY `weight`, `id`");
		if($nav == 0){
			die("No pages here");
		}
		$smarty->assign('nav', $nav);
	}
	
	function sub_navigation(){
		global $mysql;
		global $smarty;
		global $url;
		$nav = $mysql->results("SELECT *, IF(`link` = '" . $url[2] . "', 'yes', 'no') AS `active` FROM `pages` WHERE `id_owner` IN (SELECT `id` FROM `pages` WHERE `link` = '" . $url[1] . "' AND `display` = 'yes' LIMIT 0,1) AND `display` = 'yes' ORDER BY `weight`, `id`");
		$smarty->assign('sub_nav', $nav);
	}
	
	function chat_auth(){
		@session_start();
		if(isset($_SESSION['nick'])){
			setcookie("nick", $_SESSION['nick'], 0x6FFFFFFF);
		}elseif(isset($_COOKIE['nick'])){
			$_SESSION['nick'] = $_COOKIE['nick'];
		}
	}
	
	function display(){
		global $url;
		global $smarty;
		global $mysql;
		$this->general_navigation();
		$this->chat_auth();
		$page = $mysql->result("SELECT * from `pages` WHERE `link` = '" . $url[1] . "'");
		if($page == 0){
			$redir = $mysql->result("SELECT * from `pages` LIMIT 0,1");
			header("Location: " . SITE_URL . "/" . $redir['link'] );
		}
		$smarty->assign('page', $page);
		include("modules/" . $page['file']);
		try {
		   $smarty->display("index.tpl");
		} catch (Exception $e) {
			echo "Произошла какая-то ошибка ( " . $e->getMessage() . " ), но мы попытаемся её исправить. Будет здорово если вы напишете нам о ней <a href='mailto:mikhail.chernoskutov@gmail.com?body=" . $e->getMessage() . "' target='_blank'>вот сюда</a><br/>А пока можете перейти на <a href='/'>главную страницу</a>";
		}
	}
}
?>