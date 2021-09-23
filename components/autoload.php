<?php
function my_autoload($className){
	$array_paths = [
		'/models/',
		'/components/'
	];
	foreach($array_paths as $path){
		$path = $_SERVER['DOCUMENT_ROOT'] . $path . $className . '.php';
		if(is_file($path)){
			include $path;
		}
	}
}
spl_autoload_register('my_autoload');