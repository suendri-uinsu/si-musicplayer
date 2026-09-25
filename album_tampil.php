<h2>DATA ALBUM
	<a href="dashboard.php?page=album_input" class="btn">Tambah</a>
</h2>

<?php

$alb = new App\Album();
$rows = $alb->tampil();

?>

<table>
	<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>ARTIS</th>
		<th>EDIT</th>
	</tr>
	<?php $no=0; foreach ($rows as $row) { $no++;?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $row['album_name'] ?></td>
			<td><?= $row['ART'] ?></td>
			<td><a href="dashboard.php?page=album_edit&id=<?= $row['album_id'] ?>" class="btn">Edit</a></td>
		</tr>
	<?php } ?>
</table>