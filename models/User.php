<?php
namespace Models;

use Models\UserRepository;

class User
{

	private $id;
	private $username;
	private $password;

	public function getId()
	{
		return $this->id;
	}

	public function getUsername()
	{
		return $this->username;
	}
	public function setUsername(?string $username)
	{
		$this->username = $username;
	}

	public function getPassword()
	{
		return $this->password;
	}
	public function setPassword(?string $password)
	{
		$this->password = $password;
	}

}