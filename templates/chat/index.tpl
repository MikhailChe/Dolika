<script src="/javascript/jquery.js"></script>
<script type="text/javascript">
    function locs(){
		$("#chattable").load(" #chattable");
		setTimeout("locs()", 5000);
    }
	setTimeout("locs()", 5000);
</script>

<table id="chattable">
{if ($chat!=0)}
	{section name=i loop=$chat}
	<tr>
		<td style="background:#{$chat[i]['colorFromId']} !important;text-align:right;">
			{$chat[i]['time']}
		</td>
		<td style="color:#{$chat[i]['colorFromUnix']} !important;">
			{$chat[i]['text']}
		</td>
	</tr>
	{/section}
{/if}
</table>

<form method="POST" id="chatform" onsubmit='$.ajax({ url : "", type: "POST", data : $("#chatform").serialize()}); $("#chatinput1").val(""); return false;'>
C:\Appserv\chat><input class="chatinput" id="chatinput1" type="text" name="text" autofocus="autofocus" autocomplete="off">
<input type="submit">
<input type="hidden" name="action" value="post">
</form>
