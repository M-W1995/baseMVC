<?php
session_start();

use Controllers\MainController;
require('cfg/router.php');

//quick & easy autoload
spl_autoload_register(function ($class) {
    include($class.'.php');
});

//use BASE before any link inside views
define("BASE", str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', __DIR__)));

ob_start();

$controller = new MainController;

//gets requested page
if (isset($_GET['p']) && !empty($_GET['p'])) {
	$page = explode("/",$_GET['p']);
} else {
	$page[] = "home";
}

//checks if requested page is defined inside routes.cfg
if (isset($routes[$page[0]])) 
{
	$request = explode("::",$routes[$page[0]]); //checks if route requires to call a method
	$class = $request[0];
	$method = $request[1] ?? null;
	$controller = new $class;

	if (!$method) {
		$controller->home(); //if no method is specified, will call home() method by default 
	} else {
		$controller->$method(); //will call a specific method if asked 
	}
}
else {
	$controller->notFound(); //will return a 404 if route was not found
}

$content = ob_get_clean();

include("views/template.php");