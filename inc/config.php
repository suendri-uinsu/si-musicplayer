<?php

declare(strict_types=1);

// Laporan error
error_reporting(E_ALL);

// Mulai sesi
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Alamat URL
define('URL', 'http://localhost/si-musicplayer/');

// Alamat folder Asset
define('ASSET', URL . 'layout/assets/');

// Koneksi database (bisa ditimpa lewat environment variable)
define('DB_DSN', getenv('DB_DSN') ?: 'mysql:host=localhost;dbname=dbmusicplayer;charset=utf8mb4');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');

// Memanggil vendor dan fungsi bantu
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/helpers.php';
