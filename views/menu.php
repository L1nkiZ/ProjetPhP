<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Navbar</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php?page=accueil">
					Accueil
				</a>
			</li>
		</ul>
		<ul class="navbar-nav ms-auto">
			<?php
				if(!empty($_SESSION['utilisateur'])){ 
			?>
			<li class="nav-item active">
				<a class="nav-link" href="index.php?page=utilisateurs">
					<i class="fa-solid fa-users"></i> Utilisateurs
				</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="index.php?page=jeux_video">
					<i class="fa-solid fa-gamepad"></i> Jeux Vidéo
				</a>
			</li>
			<li class="nav-item me-4">
				<a class="nav-link bg-danger text-white" href="index.php?page=connexion&action=deconnexion">
					<i class="fa-solid fa-power-off"></i> Déconnexion
				</a>
			</li>
			<?php
				}else{
			?>
			<li class="nav-item me-4">
				<a class="nav-link bg-success text-white" href="index.php?page=connexion">
					<i class="fa-solid fa-power-off"></i> Connexion
				</a>
			</li>
			<?php
				}
			?>
		</ul>
	</div>
</nav>