<?php

echo "<ul>";
foreach ($list as $post) {

		echo "<li>".$post['name']."<br>".$post['dateTime']."<br><a href='index.php?c=post&a=edit&id=".$post['id']."&name=".$post['name']."'>Редактировать</a><br><a href='index.php?c=post&a=del&id=".$post['id']."'>Удалить</a></li>";

}
echo "</ul>";

echo "<a href='index.php?c=post&a=add'>добавить запись</a>";