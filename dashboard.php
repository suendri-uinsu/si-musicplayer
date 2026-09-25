<?php

require_once "inc/config.php";

// Kalau belum login, redirect ke halaman login
wajibLogin();

// Daftar halaman yang boleh dibuka (mencegah Local File Inclusion)
const PAGES = [
	'artist_tampil', 'artist_input', 'artist_edit',
	'album_tampil', 'album_input', 'album_edit',
	'track_tampil', 'track_input', 'track_edit',
	'user_tampil', 'user_input', 'user_edit',
];

$page = $_GET['page'] ?? '';
$page = in_array($page, PAGES, true) ? $page : 'dashboard_main';

require_once "layout/dashboard.php";
