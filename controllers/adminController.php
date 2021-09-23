<?php
class adminController{
	public static function actionIndex(){

		require_once $_SERVER['DOCUMENT_ROOT'] . '/viwes/user/admin.php';
	}



	public static function actionAdd(){
		if($_SERVER['REQUEST_METHOD'] = "post"){
			$errors = [];
			$name = $_POST['name'];
			$price = $_POST['price'];
			$description = $_POST['description'];
			$image = $_FILES['image'];
			$width = $_POST['width'];
			$height = $_POST['height'];
			$depth = $_POST['depth'];
			$weight = $_POST['weight'];
			$is_top = 0;
			$is_soon = 0;
			if($_POST['is_top']){
				$is_top = 1;
			}
			if($_POST['is_soon']){
				$is_soon = 1;
			}
			if(isset($name) and isset($price) and isset($description) and isset($image)) {
				admin::addProduct($name, $price, $description, $image, $width, $height, $depth, $weight, $is_top, $is_soon);
			}
		}
	}

	public static function actionOrders(){
		$orders = payment::getOrders();
		if($orders){
			require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/orders.php";
		}
	}

	public static function actionStatus($status, $id){
		$result = admin::updateStatus($status, $id);
		if($result){
			header('location: /admin/orders');
		}
	}
}



















