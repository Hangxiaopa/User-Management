<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>登录</title>
	<style>
		@import url(../style.css);
	</style>
</head>
<body>
	<div style="text-align:center;">
		<div class="input">
		<form action="check_login.php" method="post">
			name:<input type="text" name="name"><p></p>
			password:<input type="password" name="password"><p></p>
			<input type="submit" value="login" class="button">
		</form>
		</div>
	</div>
	
</body>
</html>