<?php

$ind = new App\Index();
$rows = $ind->track();

?>

<h2>Listen To Your Favorite Music For Free</h2>

<div class="grid-music">
	<?php foreach ($rows as $row) { ?>
		<?php if (!empty($row['track_file'])) { ?>

			<div>
				<p><b><?= e($row['track_name']) ?></b></p>
				<p><?= e($row['ALB'] . " - " . $row['ART']) ?></p>
				<p>

					<audio controls>
						<source src="<?= e("./layout/assets/uploads/" . $row['track_file']) ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio>					

					</p>
				</div>

			<?php } ?>
		<?php } ?>
	</div>