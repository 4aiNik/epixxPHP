<form action="index.php?c=post&a=addSave" method="post">
	<input type="hidden" name="_aft" value="<?php echo $_aft;?>">
	<input type="text" name="text" placeholder="Text">
	<button>Save</button>
</form>

<?php
echo "<a href='index.php?c=post&a=read'>список сообщений</a>";
?>