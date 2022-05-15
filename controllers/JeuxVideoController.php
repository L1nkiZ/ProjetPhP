<?php

require_once 'models/JeuxVideo.php';

class JeuxVideoController{

	private $_jeux_video;

	/*
	 * Charge le model JeuxVideo
	 */
	public function __construct()
	{
		$this->_jeux_video = new JeuxVideo();
	}


	/*
	 * Permet de charger la bonne méthode en fonction des différentes $_GET
	 * Affiche la bonne vue en fonction de $_GET
	 */
	public function render()
	{
		$controller = new JeuxVideo();

		if(!empty($_GET['page']) && $_GET['page'] === 'jeux_video' && !empty($_GET['action']) && $_GET['action'] === 'delete' && !empty($_GET['id'])){
			$this->delete($_GET['id']);
		}	
		
		elseif(!empty($_GET['page']) && $_GET['page'] === 'jeux_video'){
			if(empty($_GET['action'])){
				$jeux_videos = $this->getAll();
			}
			include('./views/jeux_video/jeux_video.php');
		}

		elseif(!empty($_GET['page']) && $_GET['page'] === 'jeux_video_create'){
			if(!empty($_GET['action']) && $_GET['action'] === 'create' ){
				$this->create();
			}
			include('./views/jeux_video/jeux_video_create.php');
		}

		elseif(!empty($_GET['page']) && $_GET['page'] === 'jeux_video_update' && !empty($_GET['id'])){
			if(!empty($_GET['id'])){
				$jeux_video = $this->getOne($_GET['id']);
			}
			if(!empty($_GET['action']) && $_GET['action'] === 'update' && !empty($_GET['id'])){
				$this->update($_GET['id']);
			}
			include('./views/jeux_video/jeux_video_update.php');

		}else{
			return header('Location:index.php?page=accueil');
		}
	}


	/*
	 * Permet la création d'un nouveau jeux video
	 */
	public function create()
	{
		if(!empty($_POST['nom']) && !empty($_POST['console'])){
			$nom = htmlentities($_POST['nom']);
			$console = htmlentities($_POST['console']);

			$this->_jeux_video->saveJeuxVideo($nom, $console);

			return header('Location:index.php?page=jeux_video');
		}
	}

	/*
	 * Récupère un jeux video en fonction de son id
	 */
	public function getOne($id)
	{
		return $this->_jeux_video->getJeuxVideo($id);
	}


	/*
	 * Récupère tous les jeux videos
	 */
	public function getAll()
	{
		return $this->_jeux_video->getAllJeuxVideo();
	}


	/*
	 * Permet la mise a jour d'un jeux video en fonction de son id
	 */
	public function update($id)
	{
		if(!empty($_POST['nom']) && !empty($_POST['console'])){
			$nom = htmlentities($_POST['nom']);
			$console = htmlentities($_POST['console']);

			$this->_jeux_video->updateJeuxVideo($id, $nom, $console);

			return header('Location:index.php?page=jeux_video');
		}
	}

	public function delete($id)
	{
		$this->_jeux_video->deleteJeuxVideo($id);
		return header('Location:index.php?page=jeux_video');
	}


}