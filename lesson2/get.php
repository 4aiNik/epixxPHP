<?php
	file_put_contents($_SERVER["DOCUMENT_ROOT"]."/epixx/file.txt",$_GET["a"]);
	echo "finish";
?>