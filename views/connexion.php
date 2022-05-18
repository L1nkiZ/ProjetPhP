<div class="col-12">
	<h1>Connexion</h1>
</div>

<div class="d-flex justify-content-center">
	<div class="col-4 mt-4">
		<form method="POST" action="index.php?page=connexion&action=login">
			<div class="form-outline mb-4">
				<input type="email" id="form2Example1" class="form-control" name="email" />
				<label class="form-label" for="form2Example1">Email</label>
			</div>

			<div class="form-outline mb-4">
				<input type="password" id="form2Example2" class="form-control" name="password" />
				<label class="form-label" for="form2Example2">Mot de passe</label>
			</div>

			<p><span class="text-danger"><?php echo $controller->getError() ?></span></p>

			<button type="submit" class="btn btn-primary btn-block mb-4">Connexion</button>
		</form>
	</div>
</div>