<?php

declare(strict_types=1);

namespace App;

class Album extends Controller
{
	public function tampil(): array
	{
		$sql = "SELECT al.*, ar.artist_name AS ART
		FROM tb_album al
		INNER JOIN tb_artist ar ON al.album_id_artist=ar.artist_id
		ORDER BY al.album_name";

		return $this->db->query($sql)->fetchAll();
	}

	public function input(array $data): bool
	{
		$sql = "INSERT INTO tb_album (album_name, album_id_artist) VALUES (:album_name, :album_id_artist)";
		$stmt = $this->db->prepare($sql);

		return $stmt->execute([
			':album_name' => trim((string) ($data['album_name'] ?? '')),
			':album_id_artist' => (int) ($data['album_id_artist'] ?? 0),
		]);
	}

	public function listArtist(): array
	{
		$sql = "SELECT * FROM tb_artist ORDER BY artist_name";

		return $this->db->query($sql)->fetchAll();
	}

	public function edit(int $id): array|false
	{
		$sql = "SELECT * FROM tb_album WHERE album_id=:album_id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([':album_id' => $id]);

		return $stmt->fetch();
	}

	public function update(array $data): bool
	{
		$sql = "UPDATE tb_album SET album_name=:album_name, album_id_artist=:album_id_artist WHERE album_id=:album_id";
		$stmt = $this->db->prepare($sql);

		return $stmt->execute([
			':album_name' => trim((string) ($data['album_name'] ?? '')),
			':album_id_artist' => (int) ($data['album_id_artist'] ?? 0),
			':album_id' => (int) ($data['album_id'] ?? 0),
		]);
	}
}
