<?php

declare(strict_types=1);

namespace App;

class User extends Controller
{
	private const array ROLES = ['1', '2'];

	public function tampil(): array
	{
		$sql = "SELECT * FROM tb_users ORDER BY user_name";

		return $this->db->query($sql)->fetchAll();
	}

	public function input(array $data): bool
	{
		$password = (string) ($data['user_password'] ?? '');
		$params = $this->params($data);

		if ($params[':user_name'] === '' || $password === '') {
			return false;
		}

		$params[':user_password'] = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO tb_users (user_name, user_password, user_email, user_nama_lengkap, user_role)
		VALUES (:user_name, :user_password, :user_email, :user_nama_lengkap, :user_role)";
		$stmt = $this->db->prepare($sql);

		return $stmt->execute($params);
	}

	public function edit(int $id): array|false
	{
		$sql = "SELECT * FROM tb_users WHERE user_id=:user_id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([':user_id' => $id]);

		return $stmt->fetch();
	}

	public function update(array $data): bool
	{
		$password = (string) ($data['user_password'] ?? '');
		$params = $this->params($data);
		$params[':user_id'] = (int) ($data['user_id'] ?? 0);

		$sql = "UPDATE tb_users SET
			user_name=:user_name,
			user_email=:user_email,
			user_nama_lengkap=:user_nama_lengkap,
			user_role=:user_role";

		// Password hanya diubah kalau diisi
		if ($password !== '') {
			$sql .= ", user_password=:user_password";
			$params[':user_password'] = password_hash($password, PASSWORD_DEFAULT);
		}

		$sql .= " WHERE user_id=:user_id";
		$stmt = $this->db->prepare($sql);

		return $stmt->execute($params);
	}

	// Parameter yang sama untuk input dan update
	private function params(array $data): array
	{
		$role = (string) ($data['user_role'] ?? '2');

		return [
			':user_name' => trim((string) ($data['user_name'] ?? '')),
			':user_email' => trim((string) ($data['user_email'] ?? '')),
			':user_nama_lengkap' => trim((string) ($data['user_nama_lengkap'] ?? '')),
			':user_role' => in_array($role, self::ROLES, true) ? $role : '2',
		];
	}
}
