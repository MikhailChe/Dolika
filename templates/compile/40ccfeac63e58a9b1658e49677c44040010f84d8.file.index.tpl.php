<?php /* Smarty version Smarty-3.1.11, created on 2012-11-03 23:26:05
         compiled from "C:\AppServ\www\templates\nearres\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265525068d6616e8968-99763352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40ccfeac63e58a9b1658e49677c44040010f84d8' => 
    array (
      0 => 'C:\\AppServ\\www\\templates\\nearres\\index.tpl',
      1 => 1351963550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265525068d6616e8968-99763352',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5068d661783d06_87489587',
  'variables' => 
  array (
    'R' => 0,
    'rowNames' => 0,
    'rowName' => 0,
    'Rr' => 0,
    'hint' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5068d661783d06_87489587')) {function content_5068d661783d06_87489587($_smarty_tpl) {?>
<form method="POST">
<table class="noborder">
	<tr>
		<td>
			Val:
		</td>
		<td>
			<input autocomplete="off" type="text" name="R" value="<?php echo $_smarty_tpl->tpl_vars['R']->value;?>
">
		</td>
		<td>
			Значение радиодетали
		</td>
	</tr>
	<tr>
		<td>
			Ряд:
		</td>
		<td>
			<select name="rowName">
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['rowNames']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<option value="<?php echo $_smarty_tpl->tpl_vars['rowNames']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['value'];?>
" <?php if ($_smarty_tpl->tpl_vars['rowNames']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['value']==$_smarty_tpl->tpl_vars['rowName']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['rowNames']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</option>
			<?php endfor; endif; ?>
			</select>
		</td>
		<td>
			Ряд
		</td>
	</tr>
	<tr>
		<td colspan="3">==================================================================
		</td>
	</tr>
	<tr>
		<td>
			Rr:
		</td>
		<td>
			<input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['Rr']->value;?>
">
		</td>
		<td>
			Значение, приближенное к ряду <?php echo $_smarty_tpl->tpl_vars['rowName']->value;?>

		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
		<td>
			<input type="submit">
		</td>
	</tr>
</table>
</form>
<?php echo $_smarty_tpl->tpl_vars['hint']->value;?>
<?php }} ?>