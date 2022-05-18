<?php

class Utilisateur{

	protected $_bdd;

	public function __construct()
	{
		try{
			$this->_bdd = new PDO('mysql:host=localhost;dbname=jeux_video;charset=utf8', 'root', 'root');
		}catch(Exception $e){
		    die('Erreur : '.$e->getMessage());
		}
	}


	/*
	 * Séléctionne l'utilisateur si il existe en BDD
	 */
	public function selectUtilisateur($email)
	{
		$sql = "SELECT email, password
				FROM utilisateurs
				WHERE email = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($email));
		return $req->fetch(PDO::FETCH_ASSOC);
	}


	/*
	 * Récupère les informations de l'utilisateur pour enregistrement en session
	 */
	public function getInfosUtilisateur($email){
		$sql = "SELECT nom, prenom, email
				FROM utilisateurs
				WHERE email = ? ";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($email));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}

	/*
	 * Récupère toutes les informations de l'utilisateur pour la modification (sauf le mot de passe)
	 */
	public function getUtilisateur($id){
		$sql = "SELECT id, nom, prenom, email
				FROM utilisateurs
				WHERE id = ? ";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}


	/*
	 * récupère tous les utilisateurs
	 */
	public function getAllUtilisateurs()
	{
		$sql = "SELECT *
				FROM utilisateurs";
		$req = $this->_bdd->prepare($sql);
		$req->execute();
		$donnees = $req->fetchall(PDO::FETCH_ASSOC);
		return $donnees;
	}


	/*
	 * Enresgitre un nouvel utilisateur
	 */
	public function saveUtilisateur($nom, $prenom, $email, $hpassword)
	{
		$sql = "INSERT INTO utilisateurs(nom, prenom, email, password)
				VALUES (?, ?, ?, ?)";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($nom, $prenom, $email, $hpassword));
	}


	/*
	 * Permet la mose à jour d'un utilisateur
	 */
	public function updateUtilisateur($id, $nom, $prenom, $email, $hpassword)
	{
		$sql = "UPDATE utilisateurs
				SET nom = ?, prenom = ?, email = ?, password = ?
				WHERE id = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($nom, $prenom, $email, $hpassword, $id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
	}


	/*
	 * Delete un utilisateur en fonction de son id
	 */
	public function deleteUtilisateur($id)
	{
		$sql = "DELETE FROM utilisateurs
				WHERE id = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
	}
}