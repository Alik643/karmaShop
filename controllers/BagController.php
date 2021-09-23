<?php
class BagController{
	public static function actionAdd($id){
		if (isset($_SESSION['user'])) {
			Bag::addToBag($id);
			$bagCount = Bag::countOfProductsInBag();
			header("location: " . $_SERVER['HTTP_REFERER']);
		}else{
			header("location: /user/index");
		}
	}
	public static function actionView(){
		session_start();
		$items = (array)$_SESSION['products'];
		$totalPrice = 0;
		if(isset($_SESSION['user'])) {
			if ($items) {
				$ids = array_keys($items);
				$idsStr = implode(', ', $ids);
				$products = Bag::getProductsByIds($idsStr);
				$allProducts = Product::getProductsList();
				$totalPrice = Bag::getTotalPrice();
			}
		}else{
			header("location: /user/index");
		}
		require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/bag/bag.php";
	}

	public static function actionDelete($id){
		Bag::delete($id);
		header("location: bag.php");
	}

	public static function actionBuy($user_id){
		$added = Payment::addToOrder();
		if($added){
			echo "sax lava";
		}else{
			echo "voria";
		}
		require_once $_SERVER["DOCUMENT_ROOT"] . "/viwes/bag/pay_page.php";
	}

	public static function actionCount(){
		echo Bag::countOfProductsInBag();
	}
}


















