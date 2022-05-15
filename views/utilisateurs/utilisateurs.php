<div class="col-12">
	<a class="btn btn-primary" href="index.php?page=utilisateurs_create">
		<i class="fa-solid fa-circle-plus"></i> Créer un utilisateur
	</a>
</div>

<div class="col-12 mt-4">
	<table class="table">
		<thead>
			<tr>
				<th>Identifiant</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Email</th>
				<th class="text-center">Modifier</th>
				<th class="text-center">Supprimer</th>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach($utilisateurs as $utilisateur){
			?>
				<tr>
					<td><?php echo $utilisateur['id'];?></td>
					<td><?php echo $utilisateur['nom'];?></td>
					<td><?php echo $utilisateur['prenom'];?></td>
					<td><?php echo $utilisateur['email'];?></td>
					<td class="text-center">
						<a class="btn btn-primary" href="index.php?page=utilisateurs_update&id=<?php echo $utilisateur['id'];?>">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td class="text-center">
						<a href="index.php?page=utilisateurs&action=delete&id=<?php echo $utilisateur['id'];?>" class="btn btn-danger">
							<i class="fas fa-trash-alt"></i>
						</a>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>