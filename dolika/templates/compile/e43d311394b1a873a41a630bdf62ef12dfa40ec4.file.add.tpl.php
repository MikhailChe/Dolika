<?php /* Smarty version Smarty-3.1.11, created on 2012-10-07 20:27:47
         compiled from "C:\AppServ\www\dolika\templates\files\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1288550718fc20290c5-75606992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43d311394b1a873a41a630bdf62ef12dfa40ec4' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\files\\add.tpl',
      1 => 1349620061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1288550718fc20290c5-75606992',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50718fc20bc1c7_71293814',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50718fc20bc1c7_71293814')) {function content_50718fc20bc1c7_71293814($_smarty_tpl) {?><div class="add-return-link">
<a href="/dolika/files">&lt- Вернуться к списку</a>
</div>
<form method="POST" enctype="multipart/form-data" class="field-list">
	<table>
		<tr>
			<td>
				Файл:
			</td>
			<td>
				<input type="file" name="file">
			</td>
		</tr>
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<textarea name="description"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input class="inputfield" type="submit" value="Добавить">
			</td>
		</tr>
		<input type="hidden" name="action" value="add">
		<div class="checkboxes-list">
		</div>
	</table>
</form><?php }} ?>