<?php

require_once 'models/Utilisateur.php';

class UtilisateurController{

	private $_utilisateur;
	
	/*
	 * Charge le model Utilisateur
	 */
	public function __construct()
	{
		$this->_utilisateur = new Utilisateur();
	}


	/*
	 * Permet de charger la bonne méthode en fonction des différentes $_GET
	 * Affiche la bonne vue en fonction de $_GET
	 */
	public function render()
	{
		$controller = New UtilisateurController();

		if(!empty($_GET['page']) && $_GET['page'] === 'utilisateurs' && !empty($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['id'])){
			$this->delete($_GET['id']);
		}	
		
		elseif(!empty($_GET['page']) && $_GET['page'] === 'utilisateurs'){
			if(empty($_GET['action'])){
				$utilisateurs = $this->getAll();
			}
			include('./views/utilisateurs/utilisateurs.php');
		}

		elseif(!empty($_GET['page']) && $_GET['page'] === 'utilisateurs_create'){
			if(!empty($_GET['action']) && $_GET['action'] === 'create' ){
				$this->create();
			}
			include('./views/utilisateurs/utilisateurs_create.php');
		}

		elseif(!empty($_GET['page']) && $_GET['page'] === 'utilisateurs_update' && !empty($_GET['id'])){
			if(!empty($_GET['id'])){
				$utilisateur = $this->getOne($_GET['id']);
			}
			if(!empty($_GET['action']) && $_GET['action'] === 'update' && !empty($_GET['id'])){
				$this->update($_GET['id']);
			}
			include('./views/utilisateurs/utilisateurs_update.php');

		}else{
			return header('Location:index.php?page=accueil');
		}
	}

	/*
	 * Permet la création d'un nouvel utilisateur
	 */
	public function create()
	{
		if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password'])){
			$nom = htmlentities($_POST['nom']);
			$prenom = htmlentities($_POST['prenom']);
			$email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);
			$hpassword = crypt($password, "$2y$07$22carcateresDeSelwolol$");

			$this->_utilisateur->saveUtilisateur($nom, $prenom, $email, $hpassword);

			return header('Location:index.php?page=utilisateurs');
		}
	}

	/*
	 * Récupère un utilisateur en fonction de son id
	 */
	public function getOne($id)
	{
		return $this->_utilisateur->getUtilisateur($id);
	}


	/*
	 * Récupère tous les utilisateurs
	 */
	public function getAll()
	{
		return $this->_utilisateur->getAllUtilisateurs();
	}


	/*
	 * Permet la mise a jour d'un utilisateur en fonction de son id
	 */
	public function update($id)
	{
		if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password'])){
			$nom = htmlentities($_POST['nom']);
			$prenom = htmlentities($_POST['prenom']);
			$email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['password']);
			$hpassword = crypt($password, "$2y$07$22carcateresDeSelwolol$");

			$this->_utilisateur->updateUtilisateur($id, $nom, $prenom, $email, $hpassword);

			return header('Location:index.php?page=utilisateurs');
		}
	}

	public function delete($id)
	{
		$this->_utilisateur->deleteUtilisateur($id);
		return header('Location:index.php?page=utilisateurs');
	}
}