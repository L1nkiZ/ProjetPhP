<div class="col-12">
	<form method="POST" action="index.php?page=utilisateurs_update&action=update&id=<?php echo $utilisateur['id'];?>">
		<input type="text" name="nom" class="form-control mt-4" placeholder="Nom" value="<?php echo $utilisateur['nom'];?>">
		<input type="text" name="prenom" class="form-control mt-4" placeholder="Prénom" value="<?php echo $utilisateur['prenom'];?>">
		<input type="text" name="email" class="form-control mt-4" placeholder="Email" value="<?php echo $utilisateur['email'];?>">
		<input type="password" name="password" class="form-control mt-4" placeholder="Mot de passe" value="">

		<div class="d-flex mt-4">
		<button type="submit" class="btn btn-success me-4">
			<i class="fas fa-save"></i> Enregistrer			
		</button>
		<a href="index.php?page=utilisateurs" class="btn btn-secondary">
			<i class="fa-solid fa-rotate-left"></i> Retour
		</a>
	</form>
</div>