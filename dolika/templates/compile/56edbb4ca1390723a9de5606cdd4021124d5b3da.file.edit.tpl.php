<?php /* Smarty version Smarty-3.1.11, created on 2012-10-07 02:02:32
         compiled from "C:\AppServ\www\dolika\templates\tags\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6819506de75f17ce47-44289974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56edbb4ca1390723a9de5606cdd4021124d5b3da' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\tags\\edit.tpl',
      1 => 1349552917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6819506de75f17ce47-44289974',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506de75f20d2b4_60888462',
  'variables' => 
  array (
    'tags' => 0,
    'id_owner' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506de75f20d2b4_60888462')) {function content_506de75f20d2b4_60888462($_smarty_tpl) {?><div class="add-return-link">
<a href="/dolika/tags">&lt- Вернуться к списку</a>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['tags']->value)){?>
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input class="inputfield" type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['tags']->value['name'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Заголовок:
			</td>
			<td>
				<input class="inputfield" type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['tags']->value['title'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Ссылка:
			</td>
			<td>
				<input class="inputfield" type="text" name="link" value="<?php echo $_smarty_tpl->tpl_vars['tags']->value['link'];?>
">
			</td>
		</tr>
		<?php if ((isset($_smarty_tpl->tpl_vars['id_owner']->value)&$_smarty_tpl->tpl_vars['id_owner']->value!='')){?><tr>
			<td>
				Родительская категория:
			</td>
			<td>
				<select name="id_owner">
					<option value="0">Родительская категория</option>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['id_owner']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['id_owner']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['id_owner']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->tpl_vars['tags']->value['id_owner']){?> selected<?php }?> style="margin-left:<?php echo ($_smarty_tpl->tpl_vars['id_owner']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['depth']+1)*10;?>
px;"><?php echo $_smarty_tpl->tpl_vars['id_owner']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</td>
		</tr><?php }else{ ?><input name="id_owner" value="<?php echo $_smarty_tpl->tpl_vars['tags']->value['id_owner'];?>
" type="hidden"><?php }?>
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<textarea name="description"><?php echo $_smarty_tpl->tpl_vars['tags']->value['description'];?>
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
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['tags']->value['id'];?>
">
		<div class="checkboxes-list">
			<input type="checkbox" name="display" value="yes" <?php if ($_smarty_tpl->tpl_vars['tags']->value['display']=='yes'){?>checked<?php }?>> Показывать на сайте
			<br>
			<input type="checkbox" name="delete" value="yes"> Удалить
		</div>
	</table>
</form>
<?php }?><?php }} ?>