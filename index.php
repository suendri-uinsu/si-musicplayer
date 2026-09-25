<?php

require_once "inc/config.php";

// Daftar halaman yang boleh dibuka (mencegah Local File Inclusion)
const PAGES = ['index_album', 'index_login'];

$page = $_GET['page'] ?? '';
$page = in_array($page, PAGES, true) ? $page : 'index_main';

// Kalau sudah login, halaman login diarahkan ke dashboard
if ($page === 'index_login' && sudahLogin()) {
	redirect("dashboard.php");
}

require_once "layout/index.php";
