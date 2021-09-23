<?php
class admin{

	public static function addProduct ($name, $price, $description, $image, $width, $height, $depth, $weight, $is_top, $is_soon){
		$db = DB::getConnection();
		$img = $image['name'];
		$ext = pathinfo($image['name'], PATHINFO_EXTENSION);
		$source = $image['tmp_name'];
		$pref = uniqid("_img_");
		$imgName = $pref . "." . $ext;
		move_uploaded_file($source, $_SERVER['DOCUMENT_ROOT'] . "/templates/img/upload/" . $imgName);
		$sql = "INSERT INTO `products` (`name`, `price`, `is_top`, `description`, `image`, `coming_soon`, `width`, `height`, `depth`, `Weight`) 
				VALUES ('$name','$price','$is_top','$description','$imgName','$is_soon','$width','$height','$depth','$weight')";
		$result = $db->query($sql);
		header("location: /index.php");
	}

	public static function getOrders(){
		$db = DB::getConnection();
		$sql = "SELECT user.login, products.name, products.price FROM orders 
    			JOIN user ON orders.user_id = user.id 
    			JOIN products ON orders.prod_id = products.id ORDER BY user.id DESC";
		$result = $db->query($sql);
		if($result){
			return $result;
		}
		return false;
	}

	public static function updateStatus($status, $id){
		$db = DB::getConnection();
		$sql = "UPDATE `orders` SET `status_id`=:status WHERE `id`=:iid ";
		$res = $db->prepare($sql);
		$res->bindParam(':status', $status, PDO::PARAM_INT);
		$res->bindParam(':iid', $id, PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
}
















