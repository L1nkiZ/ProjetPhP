<div class="col-12">
	<form method="POST" action="index.php?page=jeux_video_update&action=update&id=<?php echo $jeux_video['id'];?>">
		<input type="text" name="nom" class="form-control mt-4" placeholder="Nom" value="<?php echo $jeux_video['nom'];?>">
		<input type="text" name="console" class="form-control mt-4" placeholder="Console" value="<?php echo $jeux_video['console'];?>">

		<div class="d-flex mt-4">
		<button type="submit" class="btn btn-success me-4">
			<i class="fas fa-save"></i> Enregistrer			
		</button>
		<a href="index.php?page=jeux_video" class="btn btn-secondary">
			<i class="fa-solid fa-rotate-left"></i> Retour
		</a>
	</form>
</div>