<div class="add-return-link">
<a href="/dolika/tags/add">Добавить</a>
</div>
{if (isset($sub_nav)&$sub_nav!="")}
<div class="sub-nav">
	{section name=i loop=$sub_nav}
	<div class="sub-nav-item{if $sub_nav[i].active=='yes'} active{/if}">
		<a href="{$sub_nav[i].link}">{$sub_nav[i].name}</a>
	</div>
	{/section}
</div>{/if}
<div class="item-list">
{if isset($tags)}
<form method="POST">
<table>
	{section name=i loop=$tags}
	<tr{if $smarty.section.i.index%2==0} class="item-list-sec"{/if}>
		{if isset($tags[i].date)}
		<td>
			{$tags[i].date}
		</td>
		{/if}
		<td style="padding-left:{($tags[i].depth+1)*8}px;">
			<a href="/dolika/tags/{$tags[i].id}">{$tags[i].name}</a>
		</td>
		{if isset($tags[i].weight)}
		<td>
			<input class="input-weight" type="text" name="weight[]" value="{$tags[i].weight}" autocomplete="off">
			<input type="hidden" name="id[]" value="{$tags[i].id}">
		</td>
		{/if}
	</tr>
	{/section}
</table>
{if isset($tags[0].weight)}
<input type="hidden" name="action" value="weight_change">
<input type="submit" value="Сохранить новый порядок">
{/if}
</form>
{/if}
</div>