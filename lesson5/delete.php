<?php
include_once('db.php');
removePost($_GET['id']);
header('Location:read.php');