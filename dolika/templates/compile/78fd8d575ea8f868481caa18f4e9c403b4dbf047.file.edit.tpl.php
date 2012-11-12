<?php /* Smarty version Smarty-3.1.11, created on 2012-10-07 03:21:09
         compiled from "C:\AppServ\www\dolika\templates\chat\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7702506b5389ed1946-70124699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78fd8d575ea8f868481caa18f4e9c403b4dbf047' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\chat\\edit.tpl',
      1 => 1349552837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7702506b5389ed1946-70124699',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506b5389f39c49_16613296',
  'variables' => 
  array (
    'chat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506b5389f39c49_16613296')) {function content_506b5389f39c49_16613296($_smarty_tpl) {?><div class="add-return-link">
<a href="/dolika/chat">&lt- Вернуться к списку</a>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['chat']->value)){?>
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Дата:
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['chat']->value['date'];?>

			</td>
		</tr>
		<tr>
			<td>
				Контент:
			</td>
			<td>
				<textarea name="text"><?php echo $_smarty_tpl->tpl_vars['chat']->value['text'];?>
</textarea>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input class="inputfield" type="submit" value="Сохранить">
			</td>
		</tr>
		<input type="hidden" name="action" value="edit">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['chat']->value['id'];?>
">
		<div class="checkboxes-list">
			<input type="checkbox" name="delete" value="yes"> Удалить
		</div>
	</table>
</form>
<?php }?><?php }} ?>