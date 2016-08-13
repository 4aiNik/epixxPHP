<?php
function addPost ($text){
	$mysqli = new mysqli ("localhost", "root", "", "epixx");
	$mysqli->query ("INSERT INTO `messages` (`name`, `dateTime`) VALUES ('$text', NOW())");
	return ($mysqli->error == NULL);
}

function getPosts (){
	$mysqli = new mysqli ("localhost", "root", "", "epixx");
	$result = $mysqli->query ("SELECT * FROM `messages`");
	$data = [];
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		$data[] = $row;
	}
	return $data;
}
function removePost($id) {
	$mysqli = new mysqli ("localhost", "root", "", "epixx");
	$mysqli->query ("DELETE FROM `messages` WHERE `id` = ".$id);
	return ($mysqli->error == NULL);
}
function getPost($id) {
	$mysqli = new mysqli ("localhost", "root", "", "epixx");
	$result = $mysqli->query ("SELECT * FROM `messages` WHERE `id` = $id");
	return $result -> fetch_array(MYSQLI_ASSOC);
}
function editPost($id, $text) {
	$mysqli = new mysqli ("localhost", "root", "", "epixx");
	$result = $mysqli->query ("UPDATE `messages` SET `name` =  '$text' WHERE `id` = $id");
	return ($mysqli->error == NULL);
}
?>