<div class="add-return-link">
<a href="/dolika/catalog">&lt- Вернуться к списку</a>
</div>
<form method="POST" enctype="multipart/form-data" class="field-list">
	<table>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				<input name="name" value="{$catalog['name']}">
			</td>
		</tr>
		{if isset($tags)}
		<tr>
			<td>
				Категория:
			</td>
			<td>
				<select name="id_tag">
				{section name=i loop=$tags}
					<option value="{$tags[i]['id']}"{if $catalog['id_tag']==$tags[i]['id']} selected{/if} style="padding-left:{($tags[i].depth+1)*8}px;">{$tags[i]['name']}</option>
				{/section}
				</select>
			</td>
		</tr>
		{/if}
		<tr>
			<td>
				Производитель:
			</td>
			<td>
				<input name="producer" value="{$catalog['producer']}">
			</td>
		</tr>
		<tr>
			<td>
				Страна:
			</td>
			<td>
				<input name="country" value="{$catalog['country']}">
			</td>
		</tr>
		<tr>
			<td>
				Анонс:
			</td>
			<td>
				<textarea name="announce">{$catalog['announce']}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				Описание:
			</td>
			<td>
				<textarea name="description">{$catalog['announce']}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				Цена:
			</td>
			<td>
				<input name="price" value="{$catalog['price']}">
			</td>
		</tr>
		<tr>
			<td>
				Распродажа:
			</td>
			<td>
				<input name="sale" type="checkbox" value="yes">
			</td>
		</tr>
		<tr>
			<td>
				Цена на распродаже:
			</td>
			<td>
				<input name="sale_price" value="{$catalog['sale_price']}">
			</td>
		</tr>
		{section name=j loop=5}
		<tr>
			<td>
				{if $smarty.section.j.index==0}Изображения:{/if}
			</td>
			<td>
				<input name="images[]" type="file">
			</td>
		</tr>
		{/section}
		<tr>
			<td>
				&nbsp;
			</td>
			<td>
				<input type="submit" value="Добавить">
			</td>
		</tr>
		<input type="hidden" name="action" value="post">
		<div class="checkboxes-list">
			<input type="checkbox" name="display" value="yes" checked> Показывать на сайте<br>
		</div>
	</table>
</form>