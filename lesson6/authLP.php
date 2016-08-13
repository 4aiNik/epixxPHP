<?php
include_once ("config.php");
$mysqli = connection();

if (!empty($_POST['loginInput']) && !empty($_POST['passInput'])) {
	$login = $_POST['loginInput'];
	$pass = md5($_POST['passInput'].$salt);
	$check = $mysqli->prepare ( "SELECT `id` FROM `users` WHERE `login` = :login AND `password` = :pass" );
	$check -> execute (['login' => $login, 'pass' => $pass]);
	if ($check -> rowCount() == 1) {
		session_start();
		$_SESSION['user_id'] = md5($_POST['loginInput'].$salt);
		header("Location: read.php");
	} 
		echo "нет такого сочетания логин/пароль";
		echo "<br><br>";
		echo "<a href='indexLP.html#tabs-2'>вход</a>";
	
}
else {
	echo "ВВЕДИТЕ ДАННЫЕ";
	echo "<br><br>";
	echo "<a href='indexLP.html#tabs-2'>вход</a>";
}
