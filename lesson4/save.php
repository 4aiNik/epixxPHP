<?php
include_once("db.php");
//$path = dirname(__FILE__).'/data/'.$_POST['filename'].'.txt';	
//file_put_contents($path, $_POST['data'], FILE_APPEND);

addPost($_POST['data']);
header('Location: index.html');