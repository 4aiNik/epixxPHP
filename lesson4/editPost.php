<?php
include_once("db.php");
editPost($_POST['id'], $_POST['data']);
header('Location: read.php');