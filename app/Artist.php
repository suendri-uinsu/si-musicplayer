<?php

declare(strict_types=1);

namespace App;

class Artist extends Controller
{
	public function tampil(): array
	{
		$sql = "SELECT * FROM tb_artist ORDER BY artist_name";

		return $this->db->query($sql)->fetchAll();
	}

	public function input(array $data): bool
	{
		$sql = "INSERT INTO tb_artist (artist_name) VALUES (:artist_name)";
		$stmt = $this->db->prepare($sql);

		return $stmt->execute([
			':artist_name' => trim((string) ($data['artist_name'] ?? '')),
		]);
	}

	public function edit(int $id): array|false
	{
		$sql = "SELECT * FROM tb_artist WHERE artist_id=:artist_id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([':artist_id' => $id]);

		return $stmt->fetch();
	}

	public function update(array $data): bool
	{
		$sql = "UPDATE tb_artist SET artist_name=:artist_name WHERE artist_id=:artist_id";
		$stmt = $this->db->prepare($sql);

		return $stmt->execute([
			':artist_name' => trim((string) ($data['artist_name'] ?? '')),
			':artist_id' => (int) ($data['artist_id'] ?? 0),
		]);
	}
}
