<?php /* Smarty version Smarty-3.1.11, created on 2012-10-15 21:54:14
         compiled from "C:\AppServ\www\dolika\templates\teasers\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11923507c24b6888257-99808683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a23d07b0ca19ec3fe2b64212fd8b0040a6a956b' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\teasers\\edit.tpl',
      1 => 1350316451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11923507c24b6888257-99808683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_507c24b6903a49_77864333',
  'variables' => 
  array (
    'teasers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507c24b6903a49_77864333')) {function content_507c24b6903a49_77864333($_smarty_tpl) {?><div class="add-return-link">
<a href="/dolika/teasers">&lt; Вернуться к списку</a>
</div>
<form method="POST" enctype="multipart/form-data" class="field-list">
	<input type="hidden" name="action" value="edit">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['teasers']->value['id'];?>
">
	<div class="checkboxes-list">
		<input type="checkbox" name="display" value="yes" <?php if ($_smarty_tpl->tpl_vars['teasers']->value['display']=='yes'){?>checked<?php }?>> Показывать на сайте<br>
		<input type="checkbox" name="delete" value="yes"> Удалить<br>
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
				<textarea name="description"><?php echo $_smarty_tpl->tpl_vars['teasers']->value['description'];?>
</textarea>
			</td>
		</tr>
		<tr>
			<td>
				Изображение:
			</td>
			<td>
				<?php if (($_smarty_tpl->tpl_vars['teasers']->value['image_sml']!='')){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['teasers']->value['image_big'];?>
" rel="<?php echo $_smarty_tpl->tpl_vars['teasers']->value['id'];?>
" class="fancybox">
				<img src="<?php echo $_smarty_tpl->tpl_vars['teasers']->value['image_sml'];?>
" alt="изображение<?php echo $_smarty_tpl->tpl_vars['teasers']->value['id'];?>
">
				</a>
				<a href="?action=image_delete&id=<?php echo $_smarty_tpl->tpl_vars['teasers']->value['id'];?>
">Удалить</a>
				<?php }else{ ?><input name="image" type="file">
				<?php }?>
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
	</table>
</form><?php }} ?>