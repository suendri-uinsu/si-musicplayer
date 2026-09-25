<?php

declare(strict_types=1);

// Escape output HTML untuk mencegah XSS
function e(mixed $value): string
{
	return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Redirect lalu hentikan eksekusi
function redirect(string $url): never
{
	header("Location: {$url}");
	exit;
}

// Cek apakah user sudah login
function sudahLogin(): bool
{
	return !empty($_SESSION['login']);
}

// Wajib login, kalau belum redirect ke halaman login
function wajibLogin(): void
{
	if (!sudahLogin()) {
		redirect('index.php?page=index_login');
	}
}

// Ambil parameter id dari URL sebagai integer
function ambilId(): int
{
	return filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: 0;
}
