<?php

// add ::method to call a specific method from the controller

$routes = [
	'home' => 'Controllers\HomeController',
	'login' => 'Controllers\UserController::login',
	'register' => 'Controllers\UserController::register'
];