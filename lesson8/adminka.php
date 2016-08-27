<?php
abstract class User {
	protected $login;
	protected $pass;

	function __construct($login) {
		$this->login = $login;
	}

	abstract protected function setLogin($login);

	function greeting() {
		echo 'привет, '.$this->login;
	}
}

class Visitor extends User {
	function greeting {
		parent::greeting();

	}
	protected function setLogin($login) {
		$this->login = '';
	}
}

class Admin extends User {
	function greeting {
		parent::greeting();

	}
	protected function setLogin($login) {
		$this->login = '';
	}
}