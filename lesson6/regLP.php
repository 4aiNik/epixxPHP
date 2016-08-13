<?php
include_once ("config.php");
$mysqli = connection();

if (!empty($_POST['loginReg']) && !empty($_POST['passReg'])) {
	$login = $_POST['loginReg'];
	$pass = md5($_POST['passReg'].$salt);
	$check = $mysqli->prepare ( "SELECT `id` FROM `users` WHERE `login` = :login" );
	$check -> execute (['login' => $login]);
	if ($check -> rowCount() == 1) {
		echo "такой логин уже существует";
		echo "<br><br>";
		echo "<a href='indexLP.html'>регистрация</a>";
	} else {
		$result = $mysqli->prepare ( "INSERT INTO `users` (`login`, `password`, `registrationDate`) VALUES (:login, :pass, NOW())" );
		$result -> execute (['login' => $login, 'pass' => $pass]);
		session_start();
		$_SESSION['user_id'] = md5($_POST['loginReg'].$salt);
		header("Location: read.php");
	}
}
else {
	echo "ВВЕДИТЕ ДАННЫЕ";
	echo "<br><br>";
	echo "<a href='indexLP.html'>регистрация</a>";
}
