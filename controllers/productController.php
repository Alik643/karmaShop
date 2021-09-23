<?php
class productController{
	public static function actionView($id){
		$product = Product::getProductById($id);
		if($product){
			require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/product/product.php";
		}
	}
}