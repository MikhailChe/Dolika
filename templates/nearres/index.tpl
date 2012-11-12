{* SMARTY *}
<form method="POST">
<table class="noborder">
	<tr>
		<td>
			Val:
		</td>
		<td>
			<input autocomplete="off" type="text" name="R" value="{$R}">
		</td>
		<td>
			Значение радиодетали
		</td>
	</tr>
	<tr>
		<td>
			Ряд:
		</td>
		<td>
			<select name="rowName">
			{section name=i loop=$rowNames}
				<option value="{$rowNames[i]['value']}" {if $rowNames[i]['value']==$rowName}selected{/if}>{$rowNames[i]['name']}</option>
			{/section}
			</select>
		</td>
		<td>
			Ряд
		</td>
	</tr>
	<tr>
		<td colspan="3">==================================================================
		</td>
	</tr>
	<tr>
		<td>
			Rr:
		</td>
		<td>
			<input type="text" readonly value="{$Rr}">
		</td>
		<td>
			Значение, приближенное к ряду {$rowName}
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
		<td>
			<input type="submit">
		</td>
	</tr>
</table>
</form>
{$hint}