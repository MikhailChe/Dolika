<?php /* Smarty version Smarty-3.1.11, created on 2012-10-15 21:51:44
         compiled from "C:\AppServ\www\dolika\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20051506b401ca872d9-35996124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6532e83876e88d64f9a9aa2cb20570fa175e3d1b' => 
    array (
      0 => 'C:\\AppServ\\www\\dolika\\templates\\index.tpl',
      1 => 1350316302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20051506b401ca872d9-35996124',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506b401cb29c60_84196896',
  'variables' => 
  array (
    'meta' => 0,
    'general_nav' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506b401cb29c60_84196896')) {function content_506b401cb29c60_84196896($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['meta']->value['title'];?>
 - система управления</title>
	<script src="http://yandex.st/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/dolika/style.css">
	<script src="/dolika/tiny_mce/tiny_mce.js" type="text/javascript"></script>
	<script type="text/javascript" src="/dolika/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script src="/dolika/fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/dolika/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_buttons1 : "undo,redo,|,removeformat,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,image,code",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			language: "ru",
			forced_root_block : false
		});
		$(document).ready(function() {
			$(".fancybox").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});
		});
	</script>
	
</head>
<body>
	<div class="wrap">
		<div class="header">
			<a href="/dolika/">Стартовая</a>
			<a href="?action=logout">Выход</a>
		</div>
		<div class="middle">
			<div class="navigation">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['general_nav']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><div class="navigation-item<?php if (($_smarty_tpl->tpl_vars['general_nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["active"]=="yes")){?> active<?php }?>">
					<a href="<?php echo $_smarty_tpl->tpl_vars['general_nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["link"];?>
"><?php echo $_smarty_tpl->tpl_vars['general_nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["name"];?>
</a>
				</div><?php endfor; endif; ?>
			</div>
			<div class="content">
			<?php if ($_smarty_tpl->tpl_vars['module']->value!=''){?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['module']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php }?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
		Сделано в DoLiKa©
		</div>
	</div>
</body>
</html><?php }} ?>