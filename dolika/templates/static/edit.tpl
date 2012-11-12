<div class="add-return-link">
<a href="/dolika/static">&lt- Вернуться к списку</a>
</div>
{if isset($static)}
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input class="inputfield" type="text" name="name" value="{$static['name']}">
			</td>
		</tr>
		<tr>
			<td>
				Заголовок:
			</td>
			<td>
				<input class="inputfield" type="text" name="title" value="{$static['title']}">
			</td>
		</tr>
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<input class="inputfield" type="text" name="meta_description" value="{$static['meta_description']}">
			</td>
		</tr>
		<tr>
			<td>
				Контент:
			</td>
			<td>
				<textarea name="body">{$static['body']}</textarea>
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
		<input type="hidden" name="id" value="{$static['id']}">
		<div class="checkboxes-list">
			<input type="checkbox" name="display" value="yes" {if $static['display']=='yes'}checked{/if}> Показывать на сайте
		</div>
	</table>
</form>
{/if}