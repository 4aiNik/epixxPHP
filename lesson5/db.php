<?php
include_once("config.php");

function addPost ($text){
	global $mysqli;

	$result = $mysqli->prepare ("INSERT INTO `messages` (`name`, `dateTime`) VALUES (:text, NOW())");
	$result -> execute (['text' => $text]);
	return ($result->errorCode()[0] == 00000);
}

function getPosts (){
	global $mysqli;

	$result = $mysqli->prepare ("SELECT * FROM `messages`");
	$result -> execute();
	$data = [];
	$data = $result -> fetchAll();
	return $data;
}
function removePost($id) {
	global $mysqli;

	$stmt = $mysqli->prepare ("DELETE FROM `messages` WHERE `id` = ?");
	$stmt -> execute ([$id]);
	return ($stmt->errorCode()[0] == 00000);
}
function getPost($id) {
	global $mysqli;

	$result = $mysqli->prepare ("SELECT * FROM `messages` WHERE `id` = ?");
	$result -> execute ([$id]);
	return $result -> fetch();
}
function editPost($id, $text) {
	global $mysqli;

	$result = $mysqli->prepare ("UPDATE `messages` SET `name` =  '$text' WHERE `id` = ?");
	$result -> execute ([$id]);
	return ($result->errorCode()[0] == 00000);
}
?>