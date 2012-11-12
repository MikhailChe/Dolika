<div class="add-return-link">
<a href="/dolika/files/add">Добавить</a>
</div>
<div class="item-list">
{if isset($files) && $files!=false}
<table>
	<tr>
		<td>&nbsp;</td>
		<td>Ссылка</td>
		<td>Размер</td>
		<td>Описание</td>
	</tr>
	{section name=i loop=$files}
	<tr{if $smarty.section.i.index%2==0} class="item-list-sec"{/if}>
		<td>
			<img src="{$files[i]['icon']}">
		</td>
		<td>
			<a href="{$files[i]['link']}">{$files[i]['name']}</a>
		</td>
		<td>
			{$files[i]['size']}
		</td>
		<td>
			{$files[i]['description']}
		</td>
		<td>
			<a href="?action=delete_file&id={$files[i]['id']}">Удалить</a>
		</td>
	</tr>
	{/section}
</table>
{/if}
</div>