<?php 
namespace Controllers;

use Models\User;
use Models\UserRepository;

class UserController extends MainController
{

	public function home()
	{

	}

	public function login()
	{
		if ($this->isLoggedIn()) {
			unset($_SESSION['user']);
			return $this->redirect('/');
		}

		$model = new User;
		$repo = new UserRepository;

		if ($this->post) {
			if (!$this->post->username OR !$this->post->password) {
				$error = "Veuillez remplir tous les champs.";
			}
			else if (!$user = $repo->findOne(['username'=>$this->post->username])) {
				$error = "Nom d'utilisateur inexistant.";
			}
			else if (!password_verify($this->post->password,$user->getPassword())) {
				$error = "Mot de passe incorrect.";
			}
			else {
				$_SESSION['user'] = $user;
				return $this->redirect('/');
			}
		}

		return $this->render('user/login',['error'=>$error ?? null]);
	}


	public function register()
	{
		if ($this->isLoggedIn()) {
			return $this->redirect('/');
		}

		$repo = new UserRepository;

		if ($this->post) {
			foreach ($this->post as $inputName => $value) {
				if (empty($value)) {
					$errors[$inputName] = "Ce champs doit être rempli.";
				}
			}
			if ($repo->find(['username'=>$this->post->username])) {
				$errors['username'] = "Ce nom d'utilisateur est déjà pris.";
			}
			if ($this->post->password != $this->post->passwordConfirm) {
				$errors['password'] = "Les deux mots de passe doivent correspondre.";
			}
			else if (!isset($errors)) {
				$user = new User;
				$user->setUsername($this->post->username);
				$user->setPassword(password_hash($this->post->password,PASSWORD_DEFAULT));
				
				if (!$repo->add($user)) {
					$errors[] = "Erreur base de données.";
				}
			}
		}

		return $this->render('user/register',[
			'errors'=>$errors ?? null
		]);
	}

}