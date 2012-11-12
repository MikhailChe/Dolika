<?php /* Smarty version Smarty-3.1.11, created on 2012-10-05 03:19:20
         compiled from "C:\AppServ\www\dolika\templates\orders\item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10363506df6f1f0f4f4-63032192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2f2549e446ca09563c87e079dd5c6cffeb36580' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\orders\\item.tpl',
      1 => 1349385557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10363506df6f1f0f4f4-63032192',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506df6f20b7f08_12640964',
  'variables' => 
  array (
    'orders' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506df6f20b7f08_12640964')) {function content_506df6f20b7f08_12640964($_smarty_tpl) {?><div class="add-return-link">
<a href=".">&lt- Вернуться к списку</a>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['orders']->value)){?>
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Дата заказа:
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['orders']->value['date'];?>

			</td>
		</tr>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['orders']->value['name'];?>

			</td>
		</tr>
		<tr>
			<td>
				Телефон:
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['orders']->value['phone'];?>

			</td>
		</tr>
		<tr>
			<td>
				Почта:
			</td>
			<td>
				<?php if ($_smarty_tpl->tpl_vars['orders']->value['email']!=''){?><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['orders']->value['email'];?>
">$orders['email']</a><?php }?>
			</td>
		</tr>
		<tr>
			<td>
				Пожелания:
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['orders']->value['comment'];?>

			</td>
		</tr>
		<tr>
			<td>
				Адрес:
			</td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['orders']->value['address'];?>

			</td>
		</tr>
		<tr>
			<td>
				Комментарий:
			</td>
			<td>
				<textarea name="parfume_comment"><?php echo $_smarty_tpl->tpl_vars['orders']->value['parfume_comment'];?>
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
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['orders']->value['id'];?>
">
		<div class="checkboxes-list">
			<?php if ($_smarty_tpl->tpl_vars['orders']->value['status']=='new'||$_smarty_tpl->tpl_vars['orders']->value['status']=='view'){?>
			<input type="checkbox" name="move" value="close"> Закрыть заказ<br><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['orders']->value['status']=='new'||$_smarty_tpl->tpl_vars['orders']->value['status']=='view'||$_smarty_tpl->tpl_vars['orders']->value['status']=='closed'){?>
			<input type="checkbox" name="move" value="unclose"> Отменить заказ<br><?php }?>
		</div>
	</table>
</form>
<?php }?><?php }} ?>