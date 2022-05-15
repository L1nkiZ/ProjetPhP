<div class="col-12">
	<h1>Ma bibliothèque de jeux video</h1>
</div>

<div class="d-flex flex-wrap justify-content-between mt-4">
	<?php
		foreach ($jeux_videos as $jeux_video) {
	?>
	<div class="card col-12 col-md-4 mt-4">
		<div class="card-header">
			<h4><?php echo $jeux_video['nom'];?></h4>
		</div>
		<div class="card-body">
			<blockquote class="blockquote mb-0">
				<p>Console : <?php echo $jeux_video['console'];?></p>
			</blockquote>
		</div>
	</div>
	<?php
		}
	?>
</div>