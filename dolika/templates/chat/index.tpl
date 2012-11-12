<div class="item-list">
{if isset($chat)}
<table>
	{section name=i loop=$chat}
	<tr{if $smarty.section.i.index%2==0} class="item-list-sec"{/if}>
		<td>
			{$chat[i].date}
		</td>
		<td>
			<a href="/dolika/chat/{$chat[i].id}">{$chat[i].name}</a>
		</td>
	</tr>
	{/section}
</table>
{/if}
</div>