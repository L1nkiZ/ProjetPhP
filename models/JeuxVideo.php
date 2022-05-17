<?php

class JeuxVideo{

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
	 * Récupère toutes les informations du jeux video pour la modification
	 */
	public function getJeuxVIdeo($id){
		$sql = "SELECT id, nom, console
				FROM jeux_video
				WHERE id = ? ";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}


	/*
	 * récupère tous les jeux video
	 */
	public function getAllJeuxVideo()
	{
		$sql = "SELECT *
				FROM jeux_video";
		$req = $this->_bdd->prepare($sql);
		$req->execute();
		$donnees = $req->fetchall(PDO::FETCH_ASSOC);
		return $donnees;
	}


	/*
	 * Enresgitre un nouveau jeux video
	 */
	public function saveJeuxVideo($nom, $console)
	{
		$sql = "INSERT INTO jeux_video(nom, console)
				VALUES ('$nom', '$console')";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($nom, $console));
	}


	/*
	 * Permet la mise à jour d'un jeux video en fonction de son id
	 */
	public function updateJeuxVideo($id, $nom, $console)
	{
		$sql = "UPDATE jeux_video
				SET nom = '$nom', console = '$console'
				WHERE id = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
	}


	/*
	 * Delete un jeux video
	 */
	public function deleteJeuxVideo($id)
	{
		$sql = "DELETE FROM jeux_video
				WHERE id = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
	}
}