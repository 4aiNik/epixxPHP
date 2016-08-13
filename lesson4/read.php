<?php
$path = dirname(__FILE__);
include_once($path."/auth.php");
include_once('db.php');
$dir = $path.'/data/';
$list = getPosts();

if (isset($_SESSION['user_id'])) { 

echo "<ul>";
foreach ($list as $post) {

		echo "<li>".$post['name']."<br>".$post['dateTime']."<br><a href='edit.php?id=".$post['id']."'>Редактировать</a><br><a href='delete.php?id=".$post['id']."'>Удалить</a></li>";

}
echo "</ul>";
echo "<a href='index.html'>ввод данных</a>";
} else {
	echo "<br>";
	echo "NOPE (\/)oO(\/)";
}