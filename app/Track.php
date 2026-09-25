<?php

declare(strict_types=1);

namespace App;

class Track extends Controller
{
	private const string UPLOAD_DIR = __DIR__ . '/../layout/assets/uploads/';
	private const array ALLOWED_EXT = ['mp3'];

	public function tampil(): array
	{
		$sql = "SELECT tr.*, al.album_name AS ALB, ar.artist_name AS ART
		FROM tb_track tr
		INNER JOIN tb_album al ON tr.track_id_album=al.album_id
		LEFT JOIN tb_artist ar ON al.album_id_artist=ar.artist_id";

		return $this->db->query($sql)->fetchAll();
	}

	public function input(array $data, array $files = []): bool
	{
		$params = [
			':track_name' => trim((string) ($data['track_name'] ?? '')),
			':track_id_album' => (int) ($data['track_id_album'] ?? 0),
			':track_time' => trim((string) ($data['track_time'] ?? '')),
			':track_file' => $this->upload($files['track_file'] ?? null),
		];

		$sql = "INSERT INTO tb_track (track_name, track_id_album, track_time, track_file)
		VALUES (:track_name, :track_id_album, :track_time, :track_file)";
		$stmt = $this->db->prepare($sql);

		return $stmt->execute($params);
	}

	public function listAlbum(): array
	{
		$sql = "SELECT * FROM tb_album ORDER BY album_name";

		return $this->db->query($sql)->fetchAll();
	}

	public function edit(int $id): array|false
	{
		$sql = "SELECT * FROM tb_track WHERE track_id=:track_id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([':track_id' => $id]);

		return $stmt->fetch();
	}

	public function update(array $data, array $files = []): bool
	{
		$params = [
			':track_name' => trim((string) ($data['track_name'] ?? '')),
			':track_id_album' => (int) ($data['track_id_album'] ?? 0),
			':track_time' => trim((string) ($data['track_time'] ?? '')),
			':track_id' => (int) ($data['track_id'] ?? 0),
		];

		$sql = "UPDATE tb_track SET
			track_name=:track_name,
			track_id_album=:track_id_album,
			track_time=:track_time";

		// File lama hanya diganti kalau ada file baru yang berhasil diupload
		$file = $this->upload($files['track_file'] ?? null);
		if ($file !== null) {
			$sql .= ", track_file=:track_file";
			$params[':track_file'] = $file;
		}

		$sql .= " WHERE track_id=:track_id";
		$stmt = $this->db->prepare($sql);

		return $stmt->execute($params);
	}

	// Upload file audio, mengembalikan nama file baru atau null jika gagal/tidak ada
	private function upload(?array $file): ?string
	{
		if ($file === null || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
			return null;
		}

		$ext = strtolower(pathinfo((string) $file['name'], PATHINFO_EXTENSION));
		if (!in_array($ext, self::ALLOWED_EXT, true)) {
			return null;
		}

		$name = bin2hex(random_bytes(16)) . '.' . $ext;

		return move_uploaded_file($file['tmp_name'], self::UPLOAD_DIR . $name) ? $name : null;
	}
}
