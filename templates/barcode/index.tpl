<body>
<div id="wrap">
	<div>
		<form method="POST">
			<input type="text" name="code" value="{$code}"/>
		</form>
	</div>
	<img src="barcode_image.php?code={$code}&amp;binary={$output}" alt="barcode"/>
</div>