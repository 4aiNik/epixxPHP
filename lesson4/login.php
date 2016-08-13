<?php
session_start();
$_SESSION['user_id'] = $_POST['id'];
header('Location: read.php');