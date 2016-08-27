<?php
require 'nsp1.php';
require 'nsp2.php';

function hello(){
	return 'hello!';
}

echo hello();
echo Epic1\hello();
echo Epic2\hello();