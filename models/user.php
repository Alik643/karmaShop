<?php
class user{
	public static function checkLogin($login){
		$db = DB::getConnection();
		$sql = 'SELECT login FROM user WHERE login = :login';
		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->execute();
		$result = $result->fetch();
		if(empty($result)){
			return false;
		}
		return true;
	}

	public static function checkPassword($login, $password){
		$db = DB::getConnection();
		$sql = 'SELECT password FROM user WHERE login = :login';
		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->execute();
		$hash = $result->fetch();
		if(password_verify($password, $hash[0])){
			return true;
		}
		return false;
	}

	public static function is_contains_uppercase($login){
		$db = DB::getConnection();
		if(preg_match('/[A-Z]/', $login)){
			return true;
		}else{
			return false;
		}
	}

	public static function regist($login, $password, $country){
		$db = DB::getConnection();
		$password = password_hash($password, PASSWORD_DEFAULT );
		$sql = 'INSERT INTO `user`(`login`, `password`, `country`) VALUES (:login, :password, :country)';
		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->bindParam(':country', $country, PDO::PARAM_STR);
		$result->execute();
	}

	public static function change($login, $oldPass, $newPass){
		$db = DB::getConnection();
		$sql = "SELECT * FROM `user` WHERE login='$login'";
		$result = $db->query($sql);
		$result = $result->fetch();
		if($result){
			if(password_verify($oldPass, $result['password'])){
				$hash = password_hash($newPass, PASSWORD_DEFAULT);
				$db->query("UPDATE `user` SET `password`='$hash' WHERE login='$login'");
				return true;
			}return false;
		}return false;
	}

	public static function getUserId($login){
		$db = DB::getConnection();
		$sql = 'SELECT id FROM `user` WHERE `login` = :login';
		$result = $db->prepare($sql);
		$result->bindParam(':login', $login, PDO::PARAM_STR);
		$result->execute();
		$result = $result->fetch();
		return $result[0];
	}

	public static function historyOfOrders($user){
		$db = DB::getConnection();
		$sql = 'SELECT products.name as pr_name, orders.product_count, products.price, products.image, status.name FROM orders 
    			JOIN products ON orders.prod_id = products.id 
    			JOIN status ON orders.status_id = status.id WHERE user_id = :user';
		$result = $db->prepare($sql);
		$result->bindParam(':user', $user, PDO::PARAM_INT);
		$result->execute();
		return $result;
	}

	public static function getLogin($id){
		$sql = "SELECT login FROM `user` WHERE id = :id";
		$db = DB::getConnection();
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();
		return $result->fetch()[0];
	}
}























