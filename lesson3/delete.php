<?php
$path = dirname(__FILE__).'/data/'.$_GET['file'];
unlink($path);
header('Location:read.php');