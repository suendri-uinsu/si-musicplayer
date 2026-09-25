# SI Music Player

Program latihan OOP PHP, Matakuliah Pemrograman Berbasis Web Lanjutan, Program Studi Sistem Informasi UIN Sumatera Utara Medan.

## Kebutuhan

- PHP 8.3 atau lebih baru (disesuaikan untuk PHP 8.5), ekstensi `pdo_mysql`
- MySQL 8 / MariaDB 10.6+
- Composer

## Instalasi

1. Buat database `dbmusicplayer`, lalu import `_db/database.sql`.
2. Sesuaikan `URL` dan koneksi database di `inc/config.php`.
3. Jalankan `composer dump-autoload`.
4. Buka `index.php`, login dengan username `admin` dan password `admin`, lalu segera ganti password.

## Struktur

- `app/` : class model (namespace `App`, autoload PSR-4). Semua class turunan dari `Controller` yang menyiapkan koneksi PDO.
- `*_tampil.php`, `*_input.php`, `*_edit.php` : halaman view, dimuat oleh `dashboard.php` atau `index.php`.
- `*_proses.php` : pemroses form.
- `inc/` : konfigurasi dan fungsi bantu (`e()`, `redirect()`, `wajibLogin()`).
