<?php /* Smarty version Smarty-3.1.11, created on 2012-09-24 02:40:10
         compiled from "C:\AppServ\www\templates\chat\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10900505f724f23afa7-61399630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18ecc60abc373ec6ad616db680e569267972f3a1' => 
    array (
      0 => 'C:\\AppServ\\www\\templates\\chat\\index.tpl',
      1 => 1348432806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10900505f724f23afa7-61399630',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_505f724f27ecd5_38570657',
  'variables' => 
  array (
    'chat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_505f724f27ecd5_38570657')) {function content_505f724f27ecd5_38570657($_smarty_tpl) {?><script src="/javascript/jquery.js"></script>
<script type="text/javascript">
    function locs(){
		$("#chattable").load(" #chattable");
		setTimeout("locs()", 5000);
    }
	setTimeout("locs()", 5000);
</script>

<table id="chattable">
<?php if (($_smarty_tpl->tpl_vars['chat']->value!=0)){?>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['chat']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<tr>
		<td style="background:#<?php echo $_smarty_tpl->tpl_vars['chat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['colorFromId'];?>
 !important;text-align:right;">
			<?php echo $_smarty_tpl->tpl_vars['chat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time'];?>

		</td>
		<td style="color:#<?php echo $_smarty_tpl->tpl_vars['chat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['colorFromUnix'];?>
 !important;">
			<?php echo $_smarty_tpl->tpl_vars['chat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['text'];?>

		</td>
	</tr>
	<?php endfor; endif; ?>
<?php }?>
</table>

<form method="POST" id="chatform" onsubmit='$.ajax({ url : "", type: "POST", data : $("#chatform").serialize()}); $("#chatinput1").val(""); return false;'>
C:\Appserv\chat><input class="chatinput" id="chatinput1" type="text" name="text" autofocus="autofocus" autocomplete="off">
<input type="submit">
<input type="hidden" name="action" value="post">
</form>
<?php }} ?>