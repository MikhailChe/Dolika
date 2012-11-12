<?php /* Smarty version Smarty-3.1.11, created on 2012-10-03 03:31:35
         compiled from "C:\AppServ\www\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20199505f724f0dd730-64665417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f42e83e0216d8c5c698bef928ce514f9e2198210' => 
    array (
      0 => 'C:\\AppServ\\www\\templates\\index.tpl',
      1 => 1349212741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20199505f724f0dd730-64665417',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_505f724f1fd8e0_96067052',
  'variables' => 
  array (
    'url' => 0,
    'page' => 0,
    'nav' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_505f724f1fd8e0_96067052')) {function content_505f724f1fd8e0_96067052($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php if (($_smarty_tpl->tpl_vars['url']->value[1]!='')){?><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
 - <?php }?>В помощь радиолюбителю</title>
<script src="http://api-maps.yandex.ru/2.0.15/?load=package.standard,package.traffic&lang=ru-RU&mode=debug" type="text/javascript"></script>
<script src="http://yandex.st/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script src="/javascript/traffic.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<?php if ($_smarty_tpl->tpl_vars['page']->value['icon']!=''){?><link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['page']->value['icon'];?>
" type="image/png"><?php }?>

<?php if ($_smarty_tpl->tpl_vars['page']->value['meta_description']!=''){?><meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['page']->value['meta_description'];?>
"><?php }?>
</head>
<body>
	<div class="wrap">
		<div class="header">
		<img src="/images/favicon.png" height="16" alt="<?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
" /><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>

		</div>
		<div class="middle">
			<div class="navigation">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nav']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><div class="navigation-item<?php if (($_smarty_tpl->tpl_vars['nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["active"]=="yes")){?> active<?php }?>">
					<?php if (($_smarty_tpl->tpl_vars['nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['icon']!='')){?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['icon'];?>
" height="16" alt="<?php echo $_smarty_tpl->tpl_vars['nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["name"];?>
"/>
					<?php }?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["link"];?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["name"];?>
</a></div><?php endfor; endif; ?>

			</div>
			<div class="content">
			<?php if ($_smarty_tpl->tpl_vars['module']->value!=''){?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['module']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php }?>
			</div>
		</div>
		<div class="footer">
		
		<!-- Yandex.Metrika informer --><a href="http://metrika.yandex.ru/stat/?id=17270059&amp;from=informer" target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/17270059/1_0_FFFFFFFF_FFFFFFFF_0_pageviews" style="width:80px; height:15px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры)" /></a><!-- /Yandex.Metrika informer --><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter17270059 = new Ya.Metrika({id:17270059, enableAll: true, trackHash:true, webvisor:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/17270059" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
		
		
		<div id="map-13246575321788679" style="display: none;"></div>
		<span id="traffic-level" style="color:gray;"></div>
		
		</div>
	</div>
</body>
</html><?php }} ?>