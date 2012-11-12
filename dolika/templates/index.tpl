{* SMARTYрусо *}<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{$meta['title']} - система управления</title>
	<script src="http://yandex.st/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/dolika/style.css">
	<script src="/dolika/tiny_mce/tiny_mce.js" type="text/javascript"></script>
	<script type="text/javascript" src="/dolika/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script src="/dolika/fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/dolika/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	{literal}
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
	{/literal}
</head>
<body>
	<div class="wrap">
		<div class="header">
			<a href="/dolika/">Стартовая</a>
			<a href="?action=logout">Выход</a>
		</div>
		<div class="middle">
			<div class="navigation">
				{section name=i loop=$general_nav}<div class="navigation-item{if ($general_nav[i]["active"]=="yes")} active{/if}">
					<a href="{$general_nav[i]["link"]}">{$general_nav[i]["name"]}</a>
				</div>{/section}
			</div>
			<div class="content">
			{if $module!=''}
			{include file="$module.tpl"}
			{/if}
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
		Сделано в DoLiKa©
		</div>
	</div>
</body>
</html>