<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Epic Blog</title>
</head>
<body>
	<h1><?=$title;?></h1>
    <form action="<?=$action;?>" method="post">
    	<input type="hidden" name="token" value="<?= $token ?>">
		Логин: <input name="login" />
		Пароль: <input type="password" name="password" />
    	<button type="submit">Вход</button>
    </form>
	
	<p><a href="index.php?action=account&method=register">Register</a></p>
	<p><a href="index.php?action=account&method=index">Auth</a></p>
	
	<p>
		<?php
			if(isset($error)) {
				echo '<b>' . $error . '</b>';
			}
		?>
	</p>
</body>
</html>