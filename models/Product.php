<?php
class Product{
	public static function getProductsList(){
		$db = DB::getConnection();
		$sql = "SELECT * FROM `products`";
		$result = $db->query($sql);
		$productsList = [];
		$i = 0;
		while($row = $result->fetch()){
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['price'] = $row['price'];
			$productsList[$i]['image'] = $row['image'];
			$productsList[$i]['description'] = $row['description'];
			$i++;
		}
		return $productsList;
	}
	public static function getTopProducts(){
		$db = DB::getConnection();
		$sql = "SELECT * FROM `products` WHERE is_top = 1";
		$result = $db->query($sql);
		$topProducts = [];
		$i = 0;
		while($row = $result->fetch()){
			$shortDescription = mb_substr($row['description'], 0, 50);
			$topProducts[$i]["name"] = $row['name'];
			$topProducts[$i]["image"] = $row['image'];
			$topProducts[$i]["shortDesc"] = $shortDescription;
			$topProducts[$i]["id"] = $row['id'];
			$i++;
		}
		return $topProducts;
	}
	public static function getLatestProducts(){
		$db = DB::getConnection();
		$sql = "SELECT * FROM `products` ORDER BY id DESC LIMIT 8";
		$result = $db->query($sql);
		$latestProducts = [];
		$i = 0;
		while($row = $result->fetch()){
			$latestProducts[$i]['id'] = $row['id'];
			$latestProducts[$i]['name'] = $row['name'];
			$latestProducts[$i]['desc'] = $row['description'];
			$latestProducts[$i]['price'] = $row['price'];
			$latestProducts[$i]['image'] = $row['image'];
			$i++;
		}
		return $latestProducts;
	}
	public static function getSoonProducts(){
		$db = DB::getConnection();
		$sql = "SELECT * FROM `products` WHERE coming_soon = 1 ORDER BY id DESC LIMIT 8";
		$result = $db->query($sql);
		$soonProducts = [];
		$i = 0;
		while($row = $result->fetch()){
			$soonProducts[$i]['id'] = $row['id'];
			$soonProducts[$i]['name'] = $row['name'];
			$soonProducts[$i]['desc'] = $row['description'];
			$soonProducts[$i]['price'] = $row['price'];
			$soonProducts[$i]['image'] = $row['image'];
			$i++;
		}
		if(!$soonProducts){
			return false;
		}
		return $soonProducts;
	}
	public static function getProductById($id){
		$db = DB::getConnection();
		$sql = "SELECT * FROM `products` WHERE id = :id";
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();
		return $result->fetch();
	}

	public static function addBag($id){
		session_start();
	}
}




















