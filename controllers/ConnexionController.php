<?php

require_once 'models/Utilisateur.php';

class ConnexionController{

	private $_utilisateur;
	static $_error;


	/*
	 * Charge le model Utilisateur
	 */
	public function __construct()
	{
		$this->_utilisateur = new Utilisateur();
	}


	/*
	 * Affiche la vue connexion.php
	 * Vérifie si $_GET['action'] existe
	 * Si oui, on vérifie les données passées en POST
	 */
	public function render()
	{
		$controller = New ConnexionController();
		if(!empty($_GET['page']) && $_GET['page'] === 'connexion'){

			if(!empty($_GET['action']) && $_GET['action'] === 'login'){
				$this->login();
			}

			if(!empty($_GET['action']) && $_GET['action'] === 'deconnexion'){
				$this->logout();
			}

			include('./views/connexion.php');
		}else{
			return header('Location:index.php');
		}
	}


	public function logout()
	{
		if(!empty($_SESSION['utilisateur'])){
			unset($_SESSION['utilisateur']);
			return header('Location:index.php');
		}
	}


	/*
	 * Vérifie les données passées en $_POST dans le formulaire de connexion
	 */
	public function login()
	{
		if(!empty($_POST['email']) && !empty($_POST['password']))
		{
			$email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);

			/*
			 * Vérifie si l'utilisateur existe en BDD
			 */
			$utilisateur = $this->_utilisateur->selectUtilisateur($email, $password);
			if($utilisateur){
				/*
				 * Récupère les infos de l'utilisateur et sauvegarde en session
				 */
				$_SESSION['utilisateur'] = $this->_utilisateur->getInfosUtilisateur($email);
				return header('Location:index.php?page=accueil');
			}else{
				if($email == '' || $password == ''){
					self::$_error = "Un des champs n'est pas rempli";
				}else{
					self::$_error =  "L'identifiant ou le mot de passe est incorrect";
				}
			}
		}
	}



	/*
	 * Retourne les erreurs si il y en a
	 */
	public function getError()
	{
		if(!empty(self::$_error)) return self::$_error;
	}
}