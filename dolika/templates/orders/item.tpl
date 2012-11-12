<div class="add-return-link">
<a href="/dolika/orders">&lt- Вернуться к списку</a>
</div>
{if isset($orders)}
<form method="POST" class="field-list">
	<table>
		<tr>
			<td>
				Дата заказа:
			</td>
			<td>
				{$orders['date']}
			</td>
		</tr>
		<tr>
			<td>
				Имя:
			</td>
			<td>
				{$orders['name']}
			</td>
		</tr>
		<tr>
			<td>
				Телефон:
			</td>
			<td>
				{$orders['phone']}
			</td>
		</tr>
		<tr>
			<td>
				Почта:
			</td>
			<td>
				{if $orders['email']!=""}<a href="mailto:{$orders['email']}">$orders['email']</a>{/if}
			</td>
		</tr>
		<tr>
			<td>
				Пожелания:
			</td>
			<td>
				{$orders['comment']}
			</td>
		</tr>
		<tr>
			<td>
				Адрес:
			</td>
			<td>
				{$orders['address']}
			</td>
		</tr>
		<tr>
			<td>
				Комментарий:
			</td>
			<td>
				<textarea name="parfume_comment">{$orders['parfume_comment']}</textarea>
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
		<input type="hidden" name="id" value="{$orders['id']}">
		<div class="checkboxes-list">
			{if $orders['status']=='new' || $orders['status']=='view'}
			<input type="checkbox" name="move" value="close"> Закрыть заказ<br>{/if}
			{if $orders['status']=='new' || $orders['status']=='view' || $orders['status'] == 'closed'}
			<input type="checkbox" name="move" value="unclose"> Отменить заказ<br>{/if}
		</div>
	</table>
</form>
{/if}