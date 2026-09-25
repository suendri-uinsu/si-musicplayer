<h2>DATA ARTIS
	<a href="dashboard.php?page=artist_input" class="btn">Tambah</a>
</h2>

<?php

$art = new App\Artist();
$rows = $art->tampil();

?>

<table>
	<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>EDIT</th>
	</tr>
	<?php foreach ($rows as $row) { ?>
		<tr>
			<td><?= $row['artist_id'] ?></td>
			<td><?= $row['artist_name'] ?></td>
			<td><a href="dashboard.php?page=artist_edit&id=<?= $row['artist_id'] ?>" class="btn">Edit</a></td>
		</tr>
	<?php } ?>
</table>