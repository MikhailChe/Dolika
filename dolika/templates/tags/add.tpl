<div class="add-return-link">
<a href="/dolika/tags">&lt- Вернуться к списку</a>
</div>
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input class="inputfield" type="text" name="name">
			</td>
		</tr>
		<tr>
			<td>
				Заголовок:
			</td>
			<td>
				<input class="inputfield" type="text" name="title">
			</td>
		</tr>
		<tr>
			<td>
				Ссылка:
			</td>
			<td>
				<input class="inputfield" type="text" name="link">
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
		</tr>{/if}
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<textarea name="description"></textarea>
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
		<input type="hidden" name="action" value="post">
		<div class="checkboxes-list">
			<input type="checkbox" name="display" value="yes" checked> Показывать на сайте
		</div>
	</table>
</form>