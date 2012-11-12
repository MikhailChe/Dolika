<?php
/*русо*/
class dolika {
	function general_navigation(){
		global $smarty;
		global $url;
		global $mysql;
		$general_nav = array();
		$nav = $mysql->results("SELECT `id`, `name`, `module`,
			CONCAT('" . SITE_URL . "/dolika/', `link`, '/') AS `link`,
			IF(`link` = '" . $url[2] . "', 'yes', 'no') AS `active`
			FROM `dolika`
			ORDER BY `weight`, `id`");
		if($nav!=0 && $nav!=false){
			$general_nav = $nav;
		}
		$smarty->assign('general_nav', $general_nav);
	}
	function generate_meta(){
		global $smarty;
		global $mysql;
		global $url;
		$meta = $mysql->result("SELECT `name` AS `title` 
			FROM `dolika`
			WHERE `link` = '" . $url[2] ."'");
		$smarty->assign('meta', $meta);
	}
	function require_module(){
		global $smarty;
		global $mysql;
		global $url;
		$module = $mysql->result("SELECT `module` FROM `dolika` WHERE `link` = '" . $url[2] . "'");
		if(file_exists(ABS_PATH . "/dolika/modules/" . $module['module'] . ".php")){
			include(ABS_PATH . "/dolika/modules/" . $module['module'] . ".php");
			return true;
		}else{
			return false;
		}
	}
	function dolika_auth(){
		global $mysql;
		@session_start();
		$mysql->query("DELETE FROM `dolika_session` WHERE `lastvisit`+600 < UNIX_TIMESTAMP()");
		if($_GET['action'] == "logout"){
			$mysql->query("DELETE FROM `dolika_session` WHERE `hash` = '" . session_id() . "'");
			session_unset();
			session_regenerate_id(true);
			header("Location: " . SITE_URL . "/dolika/");
			return false;
		}
		if(isset($_POST['user'], $_POST['password'], $_POST['action']) && $_POST['action'] == 'login'){
			
			$user = $mysql->result("SELECT * FROM `dolika_password`
				WHERE `user` = '" . $_POST['user'] . "' AND `password` = '" . sha1($_POST['password']) . "' LIMIT 0,1");
			
			if($user == false){
				$mysql->query("DELETE FROM `dolika_session` WHERE `hash` = '" . session_id() . "'");
				session_unset();
				session_regenerate_id(true);
				return false;
			}
			
			if($user != false && $user['id']>0){
				session_regenerate_id();
				$_SESSION['id_owner'] = $user['id'];
				$_SESSION['password'] = sha1($_POST['password']);
				$mysql->query("INSERT INTO `dolika_session` (`id_owner`, `hash`, `lastvisit`)
					VALUES (
					'" . $user['id'] . "',
					'" . session_id() . "',
					UNIX_TIMESTAMP()
					)");
				header("Location: " . $_SERVER['REQUEST_URI']);
				return true;
			}
		}
		if(!isset($_SESSION['id_owner'], $_SESSION['password'])){
			$mysql->query("DELETE FROM `dolika_session` WHERE `hash` = '" . session_id() . "'");
			session_unset();
			session_regenerate_id(true);
			return false;
		}
		$userhash = $mysql->result("SELECT * FROM `dolika_session` WHERE `hash` = '" . session_id() . "'");
		if($userhash == false){
			session_unset();
			session_regenerate_id(true);
			return false;
		}
		$user = $mysql->result("SELECT * FROM `dolika_password` WHERE `id` = '" . $_SESSION['id_owner'] . "'");
		if($user == false){
			$mysql->query("DELETE FROM `dolika_session` WHERE `hash` = '" . session_id() . "'");
			session_unset();
			session_regenerate_id(true);
			return false;
		}
		if($user['password'] != $_SESSION['password']){
			$mysql->query("DELETE FROM `dolika_session` WHERE `hash` = '" . session_id() . "'");
			session_regenerate_id(true);
			return false;			
		}
		$mysql->query("UPDATE `dolika_session` SET `lastvisit` = UNIX_TIMESTAMP() WHERE `hash` = '" . session_id() . "'");
		return true;
	}
	function display(){
		global $smarty;
		global $url;
		$auth = $this->dolika_auth();
		$this->generate_meta();
		if($auth){
			$this->general_navigation();
			if($url[2] == ""){
				$smarty->assign('module', 'start');
			}else{
				if(!$this->require_module()){	
					$smarty->assign('module', '404');
				}
			}
			
			$smarty->display("index.tpl");
		}else{
			$smarty->display("auth.tpl");
		}
	}
}