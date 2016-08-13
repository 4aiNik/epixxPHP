<form action="index.php?c=post&a=editSave" method="post">
	<input type="hidden" name="_aft" value="<?php echo $_aft;?>">
	<input type="text" name="text" placeholder="Text" value = "<?php $_GET['name']; ?>">
	<button>Save</button>
</form>

<?php
echo "<a href='index.php?c=post&a=read'>список сообщений</a>";
?>