<?php
function template($name, array $vars = []) {
	if (!is_file($name)) {
		throw new exception ("could not load template file ($name)");
	}

	ob_start();

	$r = extract($vars);

	require($name);
	$contents = ob_get_contents();

	//var_dump($contents);exit;
	ob_end_clean();
	return $contents;
}

echo template (__DIR__ . "/template.php", array ("a" => 1, "b" => 2));