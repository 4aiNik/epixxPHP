<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php

session_start();
if (!isset($_SESSION['user_id'])) {
	echo '<a href="reg.php">Войти</a>';
} else {
	echo '<a href="out.php">Ваш ID - '.$_SESSION['user_id'].'(выйти)</a>';
}

?>

</body>