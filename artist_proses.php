<?php

// Config
require_once "inc/config.php";

wajibLogin();

$art = new App\Artist();

if (isset($_POST['btn-simpan'])) {
	$art->input($_POST);
} elseif (isset($_POST['btn-update'])) {
	$art->update($_POST);
}

redirect("dashboard.php?page=artist_tampil");
