<?php
session_start();
if(isset($_COOKIE['user'])) {
	$_SESSION['user'] = $_COOKIE['user'];
	$_SESSION['products'] = json_decode($_COOKIE[$_SESSION['user']]);
}
require_once "components/Router.php";
require "components/Autoload.php";
$obj = new Router();
$obj->run();