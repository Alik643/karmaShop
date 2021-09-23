<?php
class Bag{
	public static function addToBag($id){
		session_start();
		$bagList = [];
		$id = intval($id);
		if(isset($_SESSION['products'])){
			$bagList = (array)$_SESSION['products'];
		}
		if(array_key_exists($id, $bagList)){
			$bagList[$id]++;
		}else{
			$bagList[$id] = 1;
		}
		$_SESSION['products'] = $bagList;
		setcookie($_SESSION['user'], json_encode($bagList), time()+3600*24*364, '/', '', false,  true);

	}

	public static function countOfProductsInBag(){
		session_start();
		$count = 0;
		if(isset($_SESSION['user'])) {
			if (isset($_SESSION['products'])) {
				foreach ($_SESSION['products'] as $id => $countOfItem) {
					$count += $countOfItem;
				}
				return $count;
			} else {
				return 0;
			}
		}
		return 0;
	}

	public static function getProductsByIds($ids){
		$db = DB::getConnection();
		$sql = "SELECT * FROM products WHERE `id` IN ($ids)";
		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$prods = [];
		$i = 0;
		while($row = $result->fetch()){
			$prods[$i]['id'] = $row['id'];
			$prods[$i]['name'] = $row['name'];
			$prods[$i]['price'] = $row['price'];
			$prods[$i]['image'] = $row['image'];
			$i++;
		}
		return $prods;
	}

	public static function delete($id){
		$products = (array)$_SESSION['products'];
		if($products[$id]){
			unset($products[$id]);
		}
		$_SESSION['products'] = $products;
		setcookie($_SESSION['user'], json_encode($_SESSION['products']), time()+3600*24*364, '/', '', false,  true);
		return $products;
	}

	public static function getTotalPrice(){
		$ids = array_keys((array)$_SESSION['products']);
		$counts = array_values((array)$_SESSION['products']);
		$total = 0;
		$i = 0;
		$ids = implode(', ', $ids);
		$sql = "SELECT * FROM `products` WHERE id IN ($ids)";
		$db = DB::getConnection();
		$result = $db->query($sql);
		while($row = $result->fetch()){
			$total += (int)$row['price'] * $counts[$i];
			$i++;
		}
		return $total;
	}
}













