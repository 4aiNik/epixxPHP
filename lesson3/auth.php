<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION['user_id'])) {
	echo '<a href="login.html">Войти</a>';
} else {
	echo '<a href="logout.php">Ваш ID - '.$_SESSION['user_id'].'(выйти)</a>';
}