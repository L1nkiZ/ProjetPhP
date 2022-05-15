<div class="col-12">
	<form method="POST" action="index.php?page=utilisateurs_create&action=create">
		<input type="text" name="nom" class="form-control mt-4" placeholder="Nom">
		<input type="text" name="prenom" class="form-control mt-4" placeholder="Prénom">
		<input type="text" name="email" class="form-control mt-4" placeholder="Email">
		<input type="password" name="password" class="form-control mt-4" placeholder="Mot de passe">

		<div class="d-flex mt-4">
		<button type="submit" class="btn btn-success me-4">
			<i class="fas fa-save"></i> Enregistrer			
		</button>
		<a href="index.php?page=utilisateurs" class="btn btn-secondary">
			<i class="fa-solid fa-rotate-left"></i> Retour
		</a>
	</form>
</div>