<?php
#URL сайта
DEFINE("SITE_URL", "http://" . $_SERVER['SERVER_NAME']);
$url_path = parse_url($_SERVER['REQUEST_URI']);
$url_path['path'] = urldecode($url_path['path']);
$url = explode("/", $url_path['path']);

if($_SERVER['DOCUMENT_ROOT'][strlen($_SERVER['DOCUMENT_ROOT'])-1]=="/"){
	DEFINE("ABS_PATH", substr($_SERVER['DOCUMENT_ROOT'], 0, -1));
}else{
	DEFINE("ABS_PATH", $_SERVER['DOCUMENT_ROOT']);
}

DEFINE("SMARTY_DIR", ABS_PATH . "/smarty/");
#Ставим дефолтную временную зону
date_default_timezone_set('Etc/GMT-6');

#MYSQL
DEFINE("DB_HOST", "127.0.0.1");
DEFINE("DB_USER", "someuser");
DEFINE("DB_PASSWORD", "somepass");
DEFINE("DB_DATABASE", "somedb");


require_once(ABS_PATH . "/classes/mysql.php");
$mysql = new mysql(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
require_once(ABS_PATH . "/classes/media.php");
$mysql->debug();
require_once(ABS_PATH . "/classes/dolika.php");

header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
?>