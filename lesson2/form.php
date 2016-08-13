<?php
$name = $_POST['name'];
$birthday = strtotime($_POST['birthday']);
$today = time();

$diff = $today - $birthday;
$result = round($diff / 60 / 60 / 24)."days";
echo $name."it's".$result."from your birthday now";

//move_uploaded_file($_FILES["file"][tmp_name],"/".1.txt);
//file_put_contents("file.txt",$_GET["data"]);
//echo "finish";
?>