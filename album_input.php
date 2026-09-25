<?php

$alb = new App\Album();
$lst = $alb->listArtist();
?>

<h2>TAMBAH ALBUM</h2>

<form method="POST" action="album_proses.php">
	<table>
		<tr>
			<td>NAMA</td>
			<td><input type="text" name="album_name" required></td>
		</tr>
		<tr>
			<td>ARTIS</td>
			<td>
				<select name="album_id_artist">
					<?php foreach ($lst as $ls) { ?>
					<option value="<?= $ls['artist_id'] ?>"><?= $ls['artist_name'] ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn-simpan" value="SIMPAN"></td>
		</tr>
	</table>
</form>