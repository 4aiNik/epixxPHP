<?php
include_once "function.php";  
if (!empty($_POST['loginInput']) && !empty($_POST['passInput'])) {
	$login = mysqli_real_escape_string($mysqli, $_POST['loginInput']);
	$pass = md5($_POST['passInput']);
	$check = $mysqli->query ( "SELECT `id` FROM `users` WHERE `login` = '$login' AND `password` = '$pass';" );
	if (mysqli_num_rows($check) == 1) {
		session_start();
		$_SESSION['user_id'] = md5($_POST['loginInput']);
		header("Location: workingPage.php");
	} else {
		echo "нет такого сочетания логин/пароль";
		echo "<br><br>";
		echo "<a href='index.html#tabs-2'>вход</a>";
	}
}
else {
	echo "ВВЕДИТЕ ДАННЫЕ";
	echo "<br><br>";
	echo "<a href='index.html#tabs-2'>вход</a>";
}
