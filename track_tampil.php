<h2>DATA LAGU
	<a href="dashboard.php?page=track_input" class="btn">Tambah</a>
</h2>

<?php

$trc = new App\Track();
$rows = $trc->tampil();

?>

<table>
	<tr>
		<th>NO</th>
		<th>JUDUL</th>
		<th>ALBUM</th>
		<th>WAKTU</th>
		<th>PUTAR</th>
		<th>EDIT</th>
	</tr>
	<?php foreach ($rows as $row) { ?>
		<tr>
			<td><?= $row['track_id'] ?></td>
			<td><?= $row['track_name'] ?></td>
			<td><?= $row['ALB'] . " - " . $row['ART'] ?></td>
			<td><?= $row['track_time'] ?></td>
			<td>
				<?php if (!empty($row['track_file'])) { ?>
					<audio controls>
						<source src="<?= "./layout/assets/uploads/" . $row['track_file'] ?>" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio>					
					<?php } ?>
				</td>
				<td><a href="dashboard.php?page=track_edit&id=<?= $row['track_id'] ?>" class="btn">Edit</a></td>
			</tr>
		<?php } ?>
	</table>