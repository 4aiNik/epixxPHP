<?php
include_once "function.php";  
if (!empty($_POST['loginReg']) && !empty($_POST['passReg'])) {
	$login = mysqli_real_escape_string($mysqli, $_POST['loginReg']);
	$pass = md5($_POST['passReg']);
	$check = $mysqli->query ( "SELECT `id` FROM `users` WHERE `login` = '$login';" );
	if (mysqli_num_rows($check) == 1) {
		echo "такой логин уже существует";
		echo "<br><br>";
		echo "<a href='index.html'>регистрация</a>";
	} else {
		$mysqli->query ( "INSERT INTO `users` (`login`, `password`, `registrationDate`) VALUES ('$login', '$pass', NOW())" );
		session_start();
		$_SESSION['user_id'] = md5($_POST['loginReg']);
		header("Location: workingPage.php");
	}
}
else {
	echo "ВВЕДИТЕ ДАННЫЕ";
	echo "<br><br>";
	echo "<a href='index.html'>регистрация</a>";
}
