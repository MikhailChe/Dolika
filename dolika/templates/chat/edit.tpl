<div class="add-return-link">
<a href="/dolika/chat">&lt- Вернуться к списку</a>
</div>
{if isset($chat)}
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Дата:
			</td>
			<td>
				{$chat['date']}
			</td>
		</tr>
		<tr>
			<td>
				Контент:
			</td>
			<td>
				<textarea name="text">{$chat['text']}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input class="inputfield" type="submit" value="Сохранить">
			</td>
		</tr>
		<input type="hidden" name="action" value="edit">
		<input type="hidden" name="id" value="{$chat['id']}">
		<div class="checkboxes-list">
			<input type="checkbox" name="delete" value="yes"> Удалить
		</div>
	</table>
</form>
{/if}