<div class="add-return-link">
<a href="/dolika/teasers">&lt- Вернуться к списку</a>
</div>
<form method="POST" enctype="multipart/form-data" class="field-list">
	<input type="hidden" name="action" value="post">
	<div class="checkboxes-list">
		<input type="checkbox" name="display" value="yes" checked> Показывать на сайте<br>
	</div>
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input name="name" value="{$teasers['name']}">
			</td>
		</tr>
		<tr>
			<td>
				Ссылка:
			</td>
			<td>
				<input name="link" value="{$teasers['link']}">
			</td>
		</tr>
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<textarea name="description">{$teasers['announce']}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				Изображение:
			</td>
			<td>
				<input name="image" type="file">
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input type="submit" value="Добавить">
			</td>
		</tr>
	</table>
</form>