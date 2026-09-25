<?php

$id = ambilId();

$alb = new App\Album();
$row = $alb->edit($id);

// Kalau data tidak ditemukan, hentikan halaman ini
if ($row === false) {
	echo '<p>Data tidak ditemukan.</p>';
	return;
}

$lst = $alb->listArtist();

?>

<h2>EDIT ALBUM</h2>

<form method="POST" action="album_proses.php">
	<input type="hidden" name="album_id" value="<?= $id ?>">
	<table>
		<tr>
			<td>NAMA</td>
			<td><input type="text" name="album_name" value="<?= $row['album_name'] ?>" required></td>
		</tr>
		<tr>
			<td>ARTIS</td>
			<td>
				<select name="album_id_artist">
					<?php foreach ($lst as $ls) { ?>
					<option value="<?= $ls['artist_id'] ?>"<?= $row['album_id_artist']==$ls['artist_id'] ? " selected" : "" ?>><?= $ls['artist_name'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-update" value="UPDATE"></td>
		</tr>
	</table>
</form>