<?php
ob_start();
class userController{
	public static function actionIndex(){
		require_once $_SERVER["DOCUMENT_ROOT"] . "/viwes/user/login.php";
	}

	public static function actionLogin(){
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$login = $_POST['login'];
			$password = $_POST['password'];
			$errors = [];
			if(!user::checkLogin($login)){
				$errors[] = "-incorrect login";
			}else{
				if(!user::checkPassword($login, $password)){
					$errors[] = "-incorrect password";
				}else{
					if($login != "Root"){
						$user_id = user::getUserId($login);
						$_SESSION['user'] = $user_id;
						if(!isset($_COOKIE[$_SESSION['user']])){
							setcookie($user_id, 'cart', time()+3600*24*364, '/', '', false,  true);
						}
						if($_POST['keepMeLoggedIn']){
							setcookie('user', $user_id, time()+3600*24*364, '/', '', false, true);
						}else{
							setcookie('user', $user_id, 0, '/', '', false, true);
						}
						header('location: /');
					}else{
						$_SESSION['user'] = "root";
						require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/admin.php";
					}

				}
			}
			if($errors){
				require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/login.php";
			}
		}
	}

	public static function actionRegistration(){

		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$userName = $_POST['login'];
			$password = $_POST['password'];
			$country = $_POST['country'];
			$errors = [];
			if(!user::checkLogin($userName)){
				if(!user::is_contains_uppercase($userName)){
					$errors[] = "- Need Uppercase latter in username";
				}
			}else{
				$errors[] = "- Username is alredy taken";
			}
			if(!preg_match('/[A-Z]/', $password)){
				$errors[] = "- Need Uppercase latter in password";
			}
			if(!preg_match('/[1-9]/', $password)){
				$errors[] = "- Need number in password";
			}
			if($errors) {
				require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/newAccaunt.php";
			}else{
				user::regist($userName, $password, $country);
				header("location: /user/");
			}
		}
		require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/newAccaunt.php";
	}

	public static function actionOut(){
		unset($_SESSION['user']);
		unset($_SESSION['product']);
		unset($_COOKIE['user']);
		setcookie('user', '', time()-3600*24*370);
		header("location: index.php");
	}

	public static function actionChange(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$ok = false;
			$errors = [];
			$login = $_POST['login'];
			$oldPassword = $_POST['oldPassword'];
			$newPassword = $_POST['newPassword'];
			$res = user::change($login, $oldPassword, $newPassword);
			if(!$res){
				$errors[] = 'Somthing wents wrong...Try again';
				require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/cabinet.php";
			}
			$ok = true;
			require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/cabinet.php";
		}
	}

	public static function actionOrders($user){
		$orders = user::historyOfOrders($user);
		require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/order_history.php";
	}

	public static function actionCabinet(){
		if(isset($_SESSION['user'])) {
			require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/cabinet.php";
		}else{
			require_once $_SERVER['DOCUMENT_ROOT'] . "/viwes/user/login.php";
		}
	}
}





















