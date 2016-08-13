<?php
include_once("config.php");

function addPost ($text){
	$mysqli = connection();

	$result = $mysqli->prepare ("INSERT INTO `messages` (`name`, `dateTime`) VALUES (:text, NOW())");
	$result -> execute (['text' => $text]);
	return ($result->errorCode()[0] == 00000);
}

function getPosts (){
	$mysqli = connection();

	$result = $mysqli->prepare ("SELECT * FROM `messages`");
	$result -> execute();
	$data = [];
	$data = $result -> fetchAll();
	return $data;
}
function removePost($id) {
	$mysqli = connection();

	$stmt = $mysqli->prepare ("DELETE FROM `messages` WHERE `id` = ?");
	$stmt -> execute ([$id]);
	return ($stmt->errorCode()[0] == 00000);
}
function getPost($id) {
	$mysqli = connection();

	$result = $mysqli->prepare ("SELECT * FROM `messages` WHERE `id` = ?");
	$result -> execute ([$id]);
	return $result -> fetch();
}
function editPost($id, $text) {
	$mysqli = connection();

	$result = $mysqli->prepare ("UPDATE `messages` SET `name` =  '$text' WHERE `id` = ?");
	$result -> execute ([$id]);
	return ($result->errorCode()[0] == 00000);
}
?>