<?php /* Smarty version Smarty-3.1.11, created on 2012-11-03 23:28:21
         compiled from "C:\AppServ\www\templates\contur\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30026505f74ca87cb45-20249491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac72d80999bc2a41e8dc88a6d55b9f6495bc63fb' => 
    array (
      0 => 'C:\\AppServ\\www\\templates\\contur\\index.tpl',
      1 => 1351963698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30026505f74ca87cb45-20249491',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_505f74ca9200b2_89919310',
  'variables' => 
  array (
    'F' => 0,
    'R' => 0,
    'C' => 0,
    'ERR' => 0,
    'hint' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_505f74ca9200b2_89919310')) {function content_505f74ca9200b2_89919310($_smarty_tpl) {?>
<form method="POST">
<table class="noborder">
	<tr>
		<td>
			F:
		</td>
		<td>
			<input autocomplete="off" type="text" name="F" value="<?php echo $_smarty_tpl->tpl_vars['F']->value;?>
">
		</td>
		<td>
			Частота (Гц)
		</td>
	</tr>
	<tr>
		<td>
			R:
		</td>
		<td>
			<input autocomplete="off" type="text" name="R" value="<?php echo $_smarty_tpl->tpl_vars['R']->value;?>
">
		</td>
		<td>
			Споротивление (Ом)
		</td>
	</tr>
	<tr>
		<td>
			C:
		</td>
		<td>
			<input autocomplete="off" type="text" name="C" value="<?php echo $_smarty_tpl->tpl_vars['C']->value;?>
">
		</td>
		<td>
			Ёмкость (Ф)
		</td>
	</tr>
<?php if (($_smarty_tpl->tpl_vars['ERR']->value!='')){?>
	<tr>
		<td>
			Ошибка:
		</td>
		<td colspan="2">
			<?php echo $_smarty_tpl->tpl_vars['ERR']->value;?>

		</td>
	</tr>
<?php }?>
	<tr>
		<td>
			&nbsp;
		</td>
		<td>
			<input type="submit">
		</td>
		<td>
			&nbsp;
		</td>
	</tr>
</table>
</form>
<img src="/images/RC-desc.jpg" />
<?php echo $_smarty_tpl->tpl_vars['hint']->value;?>
<?php }} ?>