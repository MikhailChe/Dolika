{* Smarty *}
<form method="POST">
<table class="noborder">
	<tr>
		<td>
			F:
		</td>
		<td>
			<input autocomplete="off" type="text" name="F" value="{$F}">
		</td>
		<td>
			Частота (Гц)
		</td>
	</tr>
	<tr>
		<td>
			R:
		</td>
		<td>
			<input autocomplete="off" type="text" name="R" value="{$R}">
		</td>
		<td>
			Споротивление (Ом)
		</td>
	</tr>
	<tr>
		<td>
			C:
		</td>
		<td>
			<input autocomplete="off" type="text" name="C" value="{$C}">
		</td>
		<td>
			Ёмкость (Ф)
		</td>
	</tr>
{if ($ERR!="")}
	<tr>
		<td>
			Ошибка:
		</td>
		<td colspan="2">
			{$ERR}
		</td>
	</tr>
{/if}
	<tr>
		<td>
			&nbsp;
		</td>
		<td>
			<input type="submit">
		</td>
		<td>
			&nbsp;
		</td>
	</tr>
</table>
</form>
<img src="/images/RC-desc.jpg" />
{$hint}