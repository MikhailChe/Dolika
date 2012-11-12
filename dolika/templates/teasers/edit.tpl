<div class="add-return-link">
<a href="/dolika/teasers">&lt; Вернуться к списку</a>
</div>
<form method="POST" enctype="multipart/form-data" class="field-list">
	<input type="hidden" name="action" value="edit">
	<input type="hidden" name="id" value="{$teasers['id']}">
	<div class="checkboxes-list">
		<input type="checkbox" name="display" value="yes" {if $teasers['display']=='yes'}checked{/if}> Показывать на сайте<br>
		<input type="checkbox" name="delete" value="yes"> Удалить<br>
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
				<textarea name="description">{$teasers['description']}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				Изображение:
			</td>
			<td>
				{if ($teasers['image_sml']!="")}
				<a href="{$teasers['image_big']}" rel="{$teasers['id']}" class="fancybox">
				<img src="{$teasers['image_sml']}" alt="изображение{$teasers['id']}">
				</a>
				<a href="?action=image_delete&id={$teasers['id']}">Удалить</a>
				{else}<input name="image" type="file">
				{/if}
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
	</table>
</form>