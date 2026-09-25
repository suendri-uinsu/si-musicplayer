<?php

$id = ambilId();

$alb = new App\Track();
$row = $alb->edit($id);

// Kalau data tidak ditemukan, hentikan halaman ini
if ($row === false) {
	echo '<p>Data tidak ditemukan.</p>';
	return;
}

$lst = $alb->listAlbum();
?>

<h2>EDIT LAGU</h2>

<form method="POST" action="track_proses.php" enctype="multipart/form-data">
	<input type="hidden" name="track_id" value="<?= $id ?>">
	<table>
		<tr>
			<td>JUDUL</td>
			<td><input type="text" name="track_name" value="<?= $row['track_name'] ?>" required></td>
		</tr>
		<tr>
			<td>ALBUM</td>
			<td>
				<select name="track_id_album">
					<?php foreach ($lst as $ls) { ?>
						<option value="<?= $ls['album_id'] ?>"<?= $row['track_id_album']==$ls['album_id'] ? " selected" : "" ?>><?= $ls['album_name'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>DURASI</td>
			<td><input type="text" name="track_time" value="<?= $row['track_time'] ?>" required></td>
		</tr>
		<tr>
			<td>FILE (MP3)</td>
			<td><input type="file" name="track_file"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-update" value="UPDATE"></td>
		</tr>
	</table>
</form>