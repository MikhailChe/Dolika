{* SMARTY *}
<form method="POST">
<table class="noborder">
	<tr>
		<td>
			N:
		</td>
		<td>
			<input autocomplete="off" type="text" name="N" value="{$N}" placeholder="1">
		</td>
		<td>
			Количество диодов
		</td>
	</tr>
	<tr>
		<td>
			I:
		</td>
		<td>
			<input autocomplete="off" type="text" name="I" value="{$I}" placeholder="20m">
		</td>
		<td>
			Ток диодов (А)
		</td>
	</tr>
	<tr>
		<td>
			U:
		</td>
		<td>
			<input autocomplete="off" type="text" name="U" value="{$U}" placeholder="1.85">
		</td>
		<td>
			Напряжение светодиода (В)
		</td>
	</tr>
	<tr>
		<td>
			V:
		</td>
		<td>
			<input autocomplete="off" type="text" name="V" value="{$V}" placeholder="5">
		</td>
		<td>
			Напряжение питания (В)
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
			Ряд сопротивлений
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
		<td colspan="3">==================================================================
		</td>
	</tr>
	<tr>
		<td>
			R:
		</td>
		<td>
			<input type="text" readonly value="{$R}">
		</td>
		<td>
			Посчитаное сопротивление
		</td>
	</tr>
	<tr>
		<td>
			W:
		</td>
		<td>
			<input type="text" readonly value="{$W}">
		</td>
		<td>
			Мощность
		</td>
	</tr>
	<tr>
		<td colspan="3">==================================================================
		</td>
	</tr>
	<tr>
		<td>
			Ra:
		</td>
		<td>
			<input type="text" readonly value="{$Ra}">
		</td>
		<td>
			Минимально допустимое сопротивление
		</td>
	</tr>
	<tr>
		<td>
			Wa:
		</td>
		<td>
			<input type="text" readonly value="{$Wa}">
		</td>
		<td>
			Мощность при минимальном сопротивлении
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
			Сопротивление приближенное к ряду {$rowName}
		</td>
	</tr>
	<tr>
		<td>
			Wr:
		</td>
		<td>
			<input type="text" readonly value="{$Wr}">
		</td>
		<td>
			Мощность
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
{$static.body}
<div class="hintablediv">
Таблица используемых приставок: 
{$hint}
</div>