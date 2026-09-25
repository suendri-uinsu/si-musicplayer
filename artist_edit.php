<?php

$id = ambilId();

$art = new App\Artist();
$row = $art->edit($id);

// Kalau data tidak ditemukan, hentikan halaman ini
if ($row === false) {
	echo '<p>Data tidak ditemukan.</p>';
	return;
}

?>

<h2>EDIT ARTIS</h2>

<form method="POST" action="artist_proses.php">
	<input type="hidden" name="artist_id" value="<?= $id ?>">
	<table>
		<tr>
			<td>NAMA</td>
			<td><input type="text" name="artist_name" value="<?= $row['artist_name'] ?>" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-update" value="UPDATE"></td>
		</tr>
	</table>
</form>