<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/DB.php";
class siteController{
	public static function actionIndex(){
		$products = Product::getLatestProducts();
		$productsSoon = Product::getSoonProducts();
		$topProducts = Product::getTopProducts();
		require $_SERVER['DOCUMENT_ROOT'] . "/viwes/index.php";
	}
}