<?php
return [
	'bag/add/([0-9]+)' => "bag/add/$1",
	'bag/buy' => "bag/buy",
	'bag/count' => "bag/count",
	'bag/del/([0-9]+)' => "bag/delete/$1",
	'bag' => "bag/View",
	'user/login' => "user/login",
	"user/cabinet" => "user/cabinet",
	'user/orders/([0-9]+)' => "user/orders/$1",
	'user/change' => "user/change",
	'user/new' => "user/registration",
	'user' => "user/index",
	'out' => "user/out",
	'admin/orders' => "admin/orders",
	'admin/update/([0-9]+)/([0-9]+)' => "admin/status/$1/$2",
	'admin/add' => "admin/add",
	'admin' => "admin/index",
	'product/([0-9]+)' => "Product/View/$1",
	'index.php' => "site/index",
	'' => "site/index"
];