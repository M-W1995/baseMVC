<?php
namespace Controllers;

class MainController 
{
	
	public function __construct()
	{
		$this->post = !empty($_POST) ? (object) $_POST : null;
	}

	public function render($view, $vars = null) 
	{
		//allows access to passed variables from controllers to views
		if ($vars) {
			foreach ($vars as $index => $value) {
				$$index = $value;
			}
		}
		include('views/'.$view.'.php');
	}

	public function notFound()
	{
		http_response_code(404);
		return $this->render('404');
	}

	public function isLoggedIn()
	{
		return isset($_SESSION['user']);
	}

	public function redirect($url)
	{
		header("location: ".BASE.$url);
	}

}