<?php

declare(strict_types=1);

namespace App;

class Index extends Controller
{
	public function track(): array
	{
		$sql = "SELECT tr.*, al.album_name AS ALB, ar.artist_name AS ART
		FROM tb_track tr
		INNER JOIN tb_album al ON tr.track_id_album=al.album_id
		LEFT JOIN tb_artist ar ON al.album_id_artist=ar.artist_id";

		return $this->db->query($sql)->fetchAll();
	}

	public function album(): array
	{
		$sql = "SELECT tr.*, al.album_name AS ALB, ar.artist_name AS ART
		FROM tb_track tr
		INNER JOIN tb_album al ON tr.track_id_album=al.album_id
		LEFT JOIN tb_artist ar ON al.album_id_artist=ar.artist_id ORDER BY ALB";

		return $this->db->query($sql)->fetchAll();
	}

	public function login(string $user_name, string $user_password): bool
	{
		$stmt = $this->db->prepare("SELECT * FROM tb_users WHERE user_name=:user_name");
		$stmt->execute([':user_name' => $user_name]);

		$row = $stmt->fetch();

		if ($row === false || !password_verify($user_password, $row['user_password'])) {
			$_SESSION['login_error'] = "Login tidak ditemukan!";
			return false;
		}

		// Cegah session fixation
		session_regenerate_id(true);

		$_SESSION['login'] = true;
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_name'] = $row['user_name'];
		$_SESSION['user_role'] = $row['user_role'];

		return true;
	}
}
