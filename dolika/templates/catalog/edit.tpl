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
				<textarea name="description">{$catalog['description']}</textarea>
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
				<input name="sale" type="checkbox" value="yes" {if $catalog['sale']=="yes"}checked{/if}>
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
		{section name=j loop=$catalog['images']}
		
		<tr>
			<td>
				{if $smarty.section.j.index==0}Изображения:{/if}
			</td>
			<td>
				<a href="{$catalog['images'][j]['image_big']}" rel="{$catalog['id']}" class="fancybox"><img src="{$catalog['images'][j]['image_sml']}" alt="изображение{$catalog['images'][j]['id']}"></a>
				<a href="?action=image_delete&id={$catalog['images'][j]['id']}&id_owner={$catalog['id']}">Удалить</a>
			</td>
		</tr>
		{/section}
		{section name=j loop=5}
		<tr>
			<td>
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
				<input type="submit" value="Сохранить">
			</td>
		</tr>
		<input type="hidden" name="action" value="edit">
		<input type="hidden" name="id" value="{$catalog['id']}">
		<div class="checkboxes-list">
			<input type="checkbox" name="display" value="yes" {if $catalog['display']=='yes'}checked{/if}> Показывать на сайте<br>
			<input type="checkbox" name="delete" value="yes"> Удалить<br>
		</div>
	</table>
</form>