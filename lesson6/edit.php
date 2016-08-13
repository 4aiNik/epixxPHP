<form action="editPost.php" method="post">
	Текст: <input name = "data" value = "<?= $data['name']; ?>">
	<input type = "hidden" name = "id" value = "<?= $data['id']; ?>">
	<input type = "submit">
</form>