<div class="add-return-link">
<a href="/dolika/tags">&lt- Вернуться к списку</a>
</div>
{if isset($tags)}
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input class="inputfield" type="text" name="name" value="{$tags['name']}">
			</td>
		</tr>
		<tr>
			<td>
				Заголовок:
			</td>
			<td>
				<input class="inputfield" type="text" name="title" value="{$tags['title']}">
			</td>
		</tr>
		<tr>
			<td>
				Ссылка:
			</td>
			<td>
				<input class="inputfield" type="text" name="link" value="{$tags['link']}">
			</td>
		</tr>
		{if (isset($id_owner)&$id_owner!="")}<tr>
			<td>
				Родительская категория:
			</td>
			<td>
				<select name="id_owner">
					<option value="0">Родительская категория</option>
					{section name=i loop=$id_owner}
					<option value="{$id_owner[i].id}"{if $id_owner[i].id==$tags['id_owner']} selected{/if} style="margin-left:{($id_owner[i].depth+1)*10}px;">{$id_owner[i].name}</option>
					{/section}
				</select>
			</td>
		</tr>{else}<input name="id_owner" value="{$tags['id_owner']}" type="hidden">{/if}
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<textarea name="description">{$tags['description']}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input type="submit" value="Сохранить">
			</td>
		</tr>
		<input type="hidden" name="action" value="edit">
		<input type="hidden" name="id" value="{$tags['id']}">
		<div class="checkboxes-list">
			<input type="checkbox" name="display" value="yes" {if $tags['display']=='yes'}checked{/if}> Показывать на сайте
			<br>
			<input type="checkbox" name="delete" value="yes"> Удалить
		</div>
	</table>
</form>
{/if}