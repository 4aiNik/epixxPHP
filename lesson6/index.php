<?php
session_start();
require_once("db.php");
require_once("config.php");

//routing
// http://domain.com/index.php?c=post&a-read

$controller = $_GET['c'];
$action = $_GET['a'];

switch($controller) {
	case 'post':
		switch($action) {
			case 'add':
				postAdd();
				break;
			case 'addSave':
				postAddSave();
				break;
			case 'read':
				postRead();
				break;
			case 'edit':
				postEdit();
				break;
			case 'editSave':
				postEditSave();
				break;
			case 'del':
				postDel();
				break;
		}
		break;
	default:
		index();
		break;
}

function postAdd() {
	echo template ("template.php", [
		'body' => template("postAdd.php", [
			'_aft' => makeToken()
		])
	]);
}

function postAddSave() {
	if (checkToken()) {
		if (addPost($_POST['text'])) {
			index();
		} else {
			errorPage(__FUNCTION__);
		}
	} else {
		errorPage(__FUNCTION__ . "token");
	}
}

function errorPage ($msg) {
	echo "error: {$msg}";
}

function index() {
	postAdd();
}

function postRead() {
	echo template ("template.php", [
		'body' => template("read.php", [
			'list' => getPosts()
		])
	]);
}

function postEdit() {
	echo template ("template.php", [
		'body' => template("postEdit.php", [
			'_aft' => makeToken()
		])
	]);
}

function postEditSave() {
	if (checkToken()) {
		if (editPost($_POST['text'], $_POST['data'])) {
			index();
		} else {
			errorPage(__FUNCTION__);
		}
	} else {
		errorPage(__FUNCTION__ . "token");
	}	
}

function postDel() {
	echo template ("template.php", [
		'body' => template("delete.php", [
			'_aft' => makeToken()
		])
	]);
	echo template ("template.php", [
		'body' => template("read.php", [
			'list' => getPosts()
		])
	]);
}