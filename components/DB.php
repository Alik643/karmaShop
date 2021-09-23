<?php
class DB{
	public static function getConnection(){
		$params = require $_SERVER['DOCUMENT_ROOT'] . "/config/params.php";
		$db = new PDO("mysql:host={$params['host']}; dbname={$params['db_name']}", $params['login'], $params['password']);
		$db->exec("set names utf8");
		return $db;
	}
}