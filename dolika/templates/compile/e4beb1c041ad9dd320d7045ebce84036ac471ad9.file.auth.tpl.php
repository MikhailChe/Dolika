<?php /* Smarty version Smarty-3.1.11, created on 2012-10-03 03:45:11
         compiled from "C:\AppServ\www\dolika\templates\auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23280506b6067a1c409-27220957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4beb1c041ad9dd320d7045ebce84036ac471ad9' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\auth.tpl',
      1 => 1349201353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23280506b6067a1c409-27220957',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506b6067a579f2_94589277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506b6067a579f2_94589277')) {function content_506b6067a579f2_94589277($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Система управления</title>
		<script src="http://yandex.st/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="/dolika/style.css">
	</head>
	<body>
		<div id="auth_div">
			<form id="auth_form" method="POST">
				<div><input name="user" type="text" placeholder="Имя пользователя"></div>
				<div><input name="password" type="password" placeholder="Пароль"></div>
				<div><input id="auth_submit" type="submit" value="Войти"></div>
				<input type="hidden" name="action" value="login">
			</form>
		</div>
	</body>
</html><?php }} ?>