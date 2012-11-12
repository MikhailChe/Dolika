<?php /* Smarty version Smarty-3.1.11, created on 2012-09-24 19:05:27
         compiled from "C:\AppServ\www\templates\barcode\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11451505f74d0bee5d2-78117462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72475d3b66c3e4e529136907150008a38bb418c6' => 
    array (
      0 => 'C:\\AppServ\\www\\templates\\barcode\\index.tpl',
      1 => 1348491920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11451505f74d0bee5d2-78117462',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_505f74d0c47a37_36366220',
  'variables' => 
  array (
    'code' => 0,
    'output' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_505f74d0c47a37_36366220')) {function content_505f74d0c47a37_36366220($_smarty_tpl) {?><body>
<div id="wrap">
	<div>
		<form method="POST">
			<input type="text" name="code" value="<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
"/>
		</form>
	</div>
	<img src="barcode_image.php?code=<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
&amp;binary=<?php echo $_smarty_tpl->tpl_vars['output']->value;?>
" alt="barcode"/>
</div><?php }} ?>