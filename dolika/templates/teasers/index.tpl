<div class="add-return-link">
<a href="/dolika/teasers/add">Добавить</a>
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
{if isset($teasers)}
<form method="POST">
<table>
	{section name=i loop=$teasers}
	<tr{if $smarty.section.i.index%2==0} class="item-list-sec"{/if}>
		{if isset($teasers[i].date)}
		<td>
			{$teasers[i].date}
		</td>
		{/if}
		<td style="padding-left:{($teasers[i].depth+1)*8}px;">
			<a href="/dolika/teasers/{$teasers[i].id}">{$teasers[i].name}</a>
		</td>
		{if isset($teasers[i].weight)}
		<td>
			<input class="input-weight" type="text" name="weight[]" value="{$teasers[i].weight}" autocomplete="off">
			<input type="hidden" name="id[]" value="{$teasers[i].id}">
		</td>
		{/if}
	</tr>
	{/section}
</table>
{if isset($teasers[0].weight)}
<input type="hidden" name="action" value="weight_change">
<input type="submit" value="Сохранить новый порядок">
{/if}
</form>
{/if}
</div>