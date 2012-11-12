{* SMARTYрусо *}<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Система управления</title>
		<script src="http://yandex.st/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="/dolika/style.css">
	</head>
	<body>
		<div id="auth_div">
			<form id="auth_form" method="POST">
				<div><input name="user" type="text" placeholder="Имя пользователя"></div>
				<div><input name="password" type="password" placeholder="Пароль"></div>
				<div><input id="auth_submit" type="submit" value="Войти"></div>
				<input type="hidden" name="action" value="login">
			</form>
		</div>
	</body>
</html>