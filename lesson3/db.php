<?php
$mysqli = new mysqli("localhost", "root", "", "epixx");
if (mysqli_connect_errno()) {
	echo "Connect failed: ". mysqli_connect_error();
	exit();
}
/*if (!$result = $mysqli->query("INSERT INTO `messages` (`name`) VALUES ('my second query')")) {
	echo "Error on line ". __LINE__ .":". $mysqli->error;
	exit;
}*/
if (!$result = $mysqli->query ("SELECT * FROM `messages`")) {
	echo "Error on line ". __LINE__ .":". $mysqli->error;
	exit;
}
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	echo "<pre>";
 	print_r($row);
 	echo "</pre>";
}
?>