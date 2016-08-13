<?php
include_once("config.php");

header("Content-Type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION['user_id'])) {
	echo '<a href="login.html">Войти</a>';
} else {
	$result = $mysqli->prepare ("SELECT `id` FROM `users` WHERE `password` = ?");
	$result -> execute ([$_SESSION['user_id']]);
	$youId = $result -> fetchColumn();
	echo '<a href="logout.php">Ваш ID - '.$youId.'(выйти)</a>';
}