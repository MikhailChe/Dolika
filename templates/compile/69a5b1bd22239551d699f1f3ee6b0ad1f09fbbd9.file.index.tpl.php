<?php /* Smarty version Smarty-3.1.11, created on 2012-11-03 22:32:35
         compiled from "C:\AppServ\www\templates\diod\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23221505f73d22882c7-77712547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69a5b1bd22239551d699f1f3ee6b0ad1f09fbbd9' => 
    array (
      0 => 'C:\\AppServ\\www\\templates\\diod\\index.tpl',
      1 => 1351960272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23221505f73d22882c7-77712547',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_505f73d23223e9_08498641',
  'variables' => 
  array (
    'N' => 0,
    'I' => 0,
    'U' => 0,
    'V' => 0,
    'rowNames' => 0,
    'rowName' => 0,
    'ERR' => 0,
    'R' => 0,
    'W' => 0,
    'Ra' => 0,
    'Wa' => 0,
    'Rr' => 0,
    'Wr' => 0,
    'static' => 0,
    'hint' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_505f73d23223e9_08498641')) {function content_505f73d23223e9_08498641($_smarty_tpl) {?>
<form method="POST">
<table class="noborder">
	<tr>
		<td>
			N:
		</td>
		<td>
			<input autocomplete="off" type="text" name="N" value="<?php echo $_smarty_tpl->tpl_vars['N']->value;?>
" placeholder="1">
		</td>
		<td>
			Количество диодов
		</td>
	</tr>
	<tr>
		<td>
			I:
		</td>
		<td>
			<input autocomplete="off" type="text" name="I" value="<?php echo $_smarty_tpl->tpl_vars['I']->value;?>
" placeholder="20m">
		</td>
		<td>
			Ток диодов (А)
		</td>
	</tr>
	<tr>
		<td>
			U:
		</td>
		<td>
			<input autocomplete="off" type="text" name="U" value="<?php echo $_smarty_tpl->tpl_vars['U']->value;?>
" placeholder="1.85">
		</td>
		<td>
			Напряжение светодиода (В)
		</td>
	</tr>
	<tr>
		<td>
			V:
		</td>
		<td>
			<input autocomplete="off" type="text" name="V" value="<?php echo $_smarty_tpl->tpl_vars['V']->value;?>
" placeholder="5">
		</td>
		<td>
			Напряжение питания (В)
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
			Ряд сопротивлений
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
		<td colspan="3">==================================================================
		</td>
	</tr>
	<tr>
		<td>
			R:
		</td>
		<td>
			<input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['R']->value;?>
">
		</td>
		<td>
			Посчитаное сопротивление
		</td>
	</tr>
	<tr>
		<td>
			W:
		</td>
		<td>
			<input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['W']->value;?>
">
		</td>
		<td>
			Мощность
		</td>
	</tr>
	<tr>
		<td colspan="3">==================================================================
		</td>
	</tr>
	<tr>
		<td>
			Ra:
		</td>
		<td>
			<input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['Ra']->value;?>
">
		</td>
		<td>
			Минимально допустимое сопротивление
		</td>
	</tr>
	<tr>
		<td>
			Wa:
		</td>
		<td>
			<input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['Wa']->value;?>
">
		</td>
		<td>
			Мощность при минимальном сопротивлении
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
			Сопротивление приближенное к ряду <?php echo $_smarty_tpl->tpl_vars['rowName']->value;?>

		</td>
	</tr>
	<tr>
		<td>
			Wr:
		</td>
		<td>
			<input type="text" readonly value="<?php echo $_smarty_tpl->tpl_vars['Wr']->value;?>
">
		</td>
		<td>
			Мощность
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
<?php echo $_smarty_tpl->tpl_vars['static']->value['body'];?>

<div class="hintablediv">
Таблица используемых приставок: 
<?php echo $_smarty_tpl->tpl_vars['hint']->value;?>

</div><?php }} ?>