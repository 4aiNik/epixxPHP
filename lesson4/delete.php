<?php
include_once('db.php');
//echo $_GET['id'];
//exit;
removePost($_GET['id']);
header('Location:read.php');