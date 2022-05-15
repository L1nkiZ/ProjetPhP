<div class="col-12">
	<a class="btn btn-primary" href="index.php?page=jeux_video_create">
		<i class="fa-solid fa-circle-plus"></i> Créer un jeux video
	</a>
</div>

<div class="col-12 mt-4">
	<table class="table">
		<thead>
			<tr>
				<th>Identifiant</th>
				<th>Nom</th>
				<th>Console</th>
				<th class="text-center">Modifier</th>
				<th class="text-center">Supprimer</th>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach($jeux_videos as $jeux_video){
			?>
				<tr>
					<td><?php echo $jeux_video['id'];?></td>
					<td><?php echo $jeux_video['nom'];?></td>
					<td><?php echo $jeux_video['console'];?></td>
					<td class="text-center">
						<a class="btn btn-primary" href="index.php?page=jeux_video_update&id=<?php echo $jeux_video['id'];?>">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td class="text-center">
						<a href="index.php?page=jeux_video&action=delete&id=<?php echo $jeux_video['id'];?>" class="btn btn-danger">
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