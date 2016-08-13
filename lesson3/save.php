<?php
$path = dirname(__FILE__).'/data/'.$_POST['filename'].'.txt';	
file_put_contents($path, $_POST['data'], FILE_APPEND);
header('Location: index.html');