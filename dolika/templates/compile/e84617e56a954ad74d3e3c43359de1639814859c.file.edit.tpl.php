<?php /* Smarty version Smarty-3.1.11, created on 2012-10-07 02:42:51
         compiled from "C:\AppServ\www\dolika\templates\catalog\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9188507081106bea51-36081095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e84617e56a954ad74d3e3c43359de1639814859c' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\catalog\\edit.tpl',
      1 => 1349556169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9188507081106bea51-36081095',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_507081107a8ea9_83741971',
  'variables' => 
  array (
    'catalog' => 0,
    'tags' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507081107a8ea9_83741971')) {function content_507081107a8ea9_83741971($_smarty_tpl) {?><div class="add-return-link">
<a href="/dolika/catalog">&lt- Вернуться к списку</a>
</div>
<form method="POST" enctype="multipart/form-data" class="field-list">
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input name="name" value="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['name'];?>
">
			</td>
		</tr>
		<?php if (isset($_smarty_tpl->tpl_vars['tags']->value)){?>
		<tr>
			<td>
				Категория:
			</td>
			<td>
				<select name="id_tag">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['tags']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $_smarty_tpl->tpl_vars['tags']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['catalog']->value['id_tag']==$_smarty_tpl->tpl_vars['tags']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']){?> selected<?php }?> style="padding-left:<?php echo ($_smarty_tpl->tpl_vars['tags']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['depth']+1)*8;?>
px;"><?php echo $_smarty_tpl->tpl_vars['tags']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</option>
				<?php endfor; endif; ?>
				</select>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td>
				Производитель:
			</td>
			<td>
				<input name="producer" value="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['producer'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Страна:
			</td>
			<td>
				<input name="country" value="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['country'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Анонс:
			</td>
			<td>
				<textarea name="announce"><?php echo $_smarty_tpl->tpl_vars['catalog']->value['announce'];?>
</textarea>
			</td>
		</tr>
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<textarea name="description"><?php echo $_smarty_tpl->tpl_vars['catalog']->value['description'];?>
</textarea>
			</td>
		</tr>
		<tr>
			<td>
				Цена:
			</td>
			<td>
				<input name="price" value="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['price'];?>
">
			</td>
		</tr>
		<tr>
			<td>
				Распродажа:
			</td>
			<td>
				<input name="sale" type="checkbox" value="yes" <?php if ($_smarty_tpl->tpl_vars['catalog']->value['sale']=="yes"){?>checked<?php }?>>
			</td>
		</tr>
		<tr>
			<td>
				Цена на распродаже:
			</td>
			<td>
				<input name="sale_price" value="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['sale_price'];?>
">
			</td>
		</tr>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['catalog']->value['images']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
		
		<tr>
			<td>
				<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['j']['index']==0){?>Изображения:<?php }?>
			</td>
			<td>
				<a href="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['images'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['image_big'];?>
" rel="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['id'];?>
" class="fancybox"><img src="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['images'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['image_sml'];?>
" alt="изображение<?php echo $_smarty_tpl->tpl_vars['catalog']->value['images'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
"></a>
				<a href="?action=image_delete&id=<?php echo $_smarty_tpl->tpl_vars['catalog']->value['images'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id'];?>
&id_owner=<?php echo $_smarty_tpl->tpl_vars['catalog']->value['id'];?>
">Удалить</a>
			</td>
		</tr>
		<?php endfor; endif; ?>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
		<tr>
			<td>
			</td>
			<td>
				<input name="images[]" type="file">
			</td>
		</tr>
		<?php endfor; endif; ?>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input type="submit" value="Сохранить">
			</td>
		</tr>
		<input type="hidden" name="action" value="edit">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['id'];?>
">
		<div class="checkboxes-list">
			<input type="checkbox" name="display" value="yes" <?php if ($_smarty_tpl->tpl_vars['catalog']->value['display']=='yes'){?>checked<?php }?>> Показывать на сайте<br>
			<input type="checkbox" name="delete" value="yes"> Удалить<br>
		</div>
	</table>
</form><?php }} ?>