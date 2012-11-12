<?php /* Smarty version Smarty-3.1.11, created on 2012-10-26 14:48:34
         compiled from "C:\AppServ\www\dolika\templates\static\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9353506b4797438cf0-75034640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bd6b65e39e5e5329db5fe44a20efa55b04eea96' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\static\\edit.tpl',
      1 => 1349552875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9353506b4797438cf0-75034640',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506b47974a8132_62950972',
  'variables' => 
  array (
    'static' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506b47974a8132_62950972')) {function content_506b47974a8132_62950972($_smarty_tpl) {?><div class="add-return-link">
<a href="/dolika/static">&lt- Вернуться к списку</a>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['static']->value)){?>
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input class="inputfield" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['static']->value['name'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Заголовок:
			</td>
			<td>
				<input class="inputfield" type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['static']->value['title'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<input class="inputfield" type="text" name="meta_description" value="<?php echo $_smarty_tpl->tpl_vars['static']->value['meta_description'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Контент:
			</td>
			<td>
				<textarea name="body"><?php echo $_smarty_tpl->tpl_vars['static']->value['body'];?>
</textarea>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input type="submit" value="Сохранить">
			</td>
		</tr>
		<input type="hidden" name="action" value="edit">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['static']->value['id'];?>
">
		<div class="checkboxes-list">
			<input type="checkbox" name="display" value="yes" <?php if ($_smarty_tpl->tpl_vars['static']->value['display']=='yes'){?>checked<?php }?>> Показывать на сайте
		</div>
	</table>
</form>
<?php }?><?php }} ?>