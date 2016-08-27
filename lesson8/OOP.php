<?php
abstract class Human {
	public $name = 'unknown';

	function __construct($name) {
		$this->name = $name;
		static::setSex();
	}
	abstract protected function setSex();

	function greeting() {
		echo 'привет, я '.$this->name;
		echo ' я '.$this->sex;
	}

}

class Man extends Human {

	function greeting() {
		parent::greeting();
		echo ' и у меня есть борода';
	}

	protected function setSex() {
		$this->sex = 'мужик';
	}

}

class Woman extends Human {

	function greeting() {
		parent::greeting();
		echo ' зато у меня есть грудь';
	}

	protected function setSex() {
		$this->sex = 'девочка';
	}

}

$personMale = new Man('Петя');
$personMale->greeting();

echo '<br>';

$personFemale = new Woman('Маша');
$personFemale->greeting();

echo '<br>';

$personUnknown = new Man('Вася');
$personUnknown->greeting();