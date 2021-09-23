<?php
class Payment{

	public static function addToOrder(){
		$user_id = $_SESSION['user'];
		$db = DB::getConnection();
		$date = date("Y-m-d H:i:s");
		$prods = $_SESSION['products'];
		foreach ($prods as $id => $count) {
			$result = $db->query("INSERT INTO `orders`(`user_id`, `product_count`, `prod_id`, `date`, `status_id`)
			VALUES ('$user_id', '$count','$id', '$date', 4)");
			if (empty($result)) {
				header('location: /bag');
			}
		}
		$_SESSION['products'] = [];
		setcookie($_SESSION['user'], 'cart', time()+3600*24*364, '/', '', false,  true);
		return true;
	}

	public static function getOrders(){
		$db = DB::getConnection();
		$sql = "SELECT orders.status_id, orders.id, products.name, products.price, user.login 
				FROM orders JOIN products ON orders.prod_id = products.id 
				JOIN user ON orders.user_id = user.id";
		$result = $db->query($sql);
		return $result;
	}

}
















