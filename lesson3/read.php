<?php
$path = dirname(__FILE__);
include_once($path."/auth.php");
$dir = $path.'/data/';
$list = scandir($dir);

if (isset($_SESSION['user_id'])) { 

echo "<ul>";
foreach ($list as $filename) {
	$file = $dir.$filename;
	if (is_file($file)) {
		echo "<li>".file_get_contents($file)."<br><a href='edit.php?file=".$filename."'>Редактировать</a><br><a href='delete.php?file=".$filename."'>Удалить</a></li>";
	}
}
echo "</ul>";
} else {
	echo "<br>";
	echo "NOPE (\/)oO(\/)";
}