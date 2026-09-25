<h2>DAFTAR ALBUM</h2>

<?php

$ind = new App\Index();
$rows = $ind->album();

?>

<table>
	<tr>
		<th>ALBUM</th>
		<th>ARTIS</th>
		<th>LAGU</th>
	</tr>
	<?php $no=0; foreach ($rows as $row) { $no++;?>
		<tr>
			<td><?= e($row['ALB']) ?></td>
			<td><?= e($row['ART']) ?></td>
			<td>
				<?php if (!empty($row['track_file'])) { ?>
					<audio controls>
						<source src="<?= e("./layout/assets/uploads/" . $row['track_file']) ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio>					
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	</table>