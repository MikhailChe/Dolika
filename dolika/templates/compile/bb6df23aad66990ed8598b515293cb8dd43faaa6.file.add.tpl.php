<?php /* Smarty version Smarty-3.1.11, created on 2012-10-15 21:36:27
         compiled from "C:\AppServ\www\dolika\templates\teasers\add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12387507c23adaad705-45367690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb6df23aad66990ed8598b515293cb8dd43faaa6' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\teasers\\add.tpl',
      1 => 1350315386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12387507c23adaad705-45367690',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_507c23adb20664_44294898',
  'variables' => 
  array (
    'teasers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507c23adb20664_44294898')) {function content_507c23adb20664_44294898($_smarty_tpl) {?><div class="add-return-link">
<a href="/dolika/teasers">&lt- Вернуться к списку</a>
</div>
<form method="POST" enctype="multipart/form-data" class="field-list">
	<input type="hidden" name="action" value="post">
	<div class="checkboxes-list">
		<input type="checkbox" name="display" value="yes" checked> Показывать на сайте<br>
	</div>
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input name="name" value="<?php echo $_smarty_tpl->tpl_vars['teasers']->value['name'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Ссылка:
			</td>
			<td>
				<input name="link" value="<?php echo $_smarty_tpl->tpl_vars['teasers']->value['link'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<textarea name="description"><?php echo $_smarty_tpl->tpl_vars['teasers']->value['announce'];?>
</textarea>
			</td>
		</tr>
		<tr>
			<td>
				Изображение:
			</td>
			<td>
				<input name="image" type="file">
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input type="submit" value="Добавить">
			</td>
		</tr>
	</table>
</form><?php }} ?>