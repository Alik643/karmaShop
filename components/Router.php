<?php
class Router{
	private $routes;
	public function __construct(){
		$this->routes = require $_SERVER['DOCUMENT_ROOT'] . "/config/routes.php";
	}

	public function getURI(){
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI']);
		}
	}

	public function run(){
		$uri = ltrim(self::getURI(), '/');
		foreach ($this->routes as $routePattern => $path){
			if(preg_match("~$routePattern~", $uri)){
				$internalRoute = preg_replace("~$routePattern~", $path, $uri);
				$segments = explode("/", $internalRoute);
				$controllerName = ucfirst(array_shift($segments)) . "Controller";
				$actionName = "action" . ucfirst(array_shift($segments));
				if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/controllers/" . $controllerName . ".php")){
					require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/" . $controllerName . ".php";
				}
				$controllerObj = new $controllerName();
				$result = call_user_func_array([$controllerObj, $actionName], $segments);
				exit;
			}
		}
	}

}