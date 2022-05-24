<?php

namespace Models;

use Models\User;

class UserRepository extends Model
{
	public function findAll() 
	{
		$req = "SELECT * FROM user";
		$sth = $this->dbh->prepare($req);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function find($params)
	{
		if (is_array($params)) {
			$paramsCount = count($params);
			$i = 1;
			$text = '';
			foreach ($params as $column => $value) {
				$text .= "$column = '$value'";
				if ($i < $paramsCount) {
					$text .= " AND ";
				}
				$i++;
			}
		} else {
			$id = $params->getId();
			$text = "id = '$id'";
		}

		$req = "SELECT * FROM user WHERE $text";
		$sth = $this->dbh->prepare($req);
		$sth->execute();
		$sth->setFetchMode(\PDO::FETCH_CLASS, "Models\User"); //returns response as objects
		return $sth->fetchAll();
	}

	public function findOne($params)
	{
		if (is_array($params)) {
			$paramsCount = count($params);
			$i = 1;
			$text = '';
			foreach ($params as $column => $value) {
				$text .= "$column = '$value'";
				if ($i < $paramsCount) {
					$text .= " AND ";
				}
				$i++;
			}
		} else {
			$id = $params->getId();
			$text = "id = '$id'";
		}

		$req = "SELECT * FROM user WHERE $text";
		$sth = $this->dbh->prepare($req);
		$sth->execute();
		$sth->setFetchMode(\PDO::FETCH_CLASS, "Models\User"); //returns response as objects
		return $sth->fetch();
	}

	public function add(User $user)
	{
		$req = "INSERT INTO user (username,password) VALUES (?,?)";
		$sth = $this->dbh->prepare($req);
		return $sth->execute([$user->getUsername(),$user->getPassword()]);
	}

}