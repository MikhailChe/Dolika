<?#русо

if (function_exists('mb_internal_charset')) {
  mb_internal_charset('UTF-8');
}
define('SMARTY_RESOURCE_CHAR_SET', 'UTF-8');
require_once(SMARTY_DIR . "Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = ABS_PATH . '/templates/';
$smarty->compile_dir = ABS_PATH . '/templates/compile/';
$smarty->cache_dir = ABS_PATH . '/templates/cache/';
$smarty->config_dir = ABS_PATH . '/templates/config/';

$smarty->assign('url', $url);
?>