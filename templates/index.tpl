{* SMARTYрусо *}<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{if ($url[1]!='')}{$page['title']} - {/if}В помощь радиолюбителю</title>
<script src="http://api-maps.yandex.ru/2.0.15/?load=package.standard,package.traffic&lang=ru-RU&mode=debug" type="text/javascript"></script>
<script src="http://yandex.st/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script src="/javascript/traffic.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
{if $page['icon']!=''}<link rel="shortcut icon" href="{$page['icon']}" type="image/png">{/if}

{if $page['meta_description']!=''}<meta name="description" content="{$page['meta_description']}">{/if}
</head>
<body>
	<div class="wrap">
		<div class="header">
		<img src="/images/favicon.png" height="16" alt="{$page['name']}" />{$page['name']}
		</div>
		<div class="middle">
			<div class="navigation">
				{section name=i loop=$nav}<div class="navigation-item{if ($nav[i]["active"]=="yes")} active{/if}">
					{if ($nav[i]['icon']!="")}
					<img src="{$nav[i]['icon']}" height="16" alt="{$nav[i]["name"]}"/>
					{/if}
					<a href="{$nav[i]["link"]}">{$nav[i]["name"]}</a></div>{/section}

			</div>
			<div class="content">
			{if $module!=''}
			{include file="$module.tpl"}
			{/if}
			</div>
		</div>
		<div class="footer">
		{literal}
		<!-- Yandex.Metrika informer --><a href="http://metrika.yandex.ru/stat/?id=17270059&amp;from=informer" target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/17270059/1_0_FFFFFFFF_FFFFFFFF_0_pageviews" style="width:80px; height:15px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры)" /></a><!-- /Yandex.Metrika informer --><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter17270059 = new Ya.Metrika({id:17270059, enableAll: true, trackHash:true, webvisor:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/17270059" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
		{/literal}
		{literal}
		<div id="map-13246575321788679" style="display: none;"></div>
		<span id="traffic-level" style="color:gray;"></div>
		{/literal}
		</div>
	</div>
</body>
</html>