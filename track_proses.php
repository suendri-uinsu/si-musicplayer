<?php

// Config
require_once "inc/config.php";

wajibLogin();

$trc = new App\Track();

if (isset($_POST['btn-simpan'])) {
	$trc->input($_POST, $_FILES);
} elseif (isset($_POST['btn-update'])) {
	$trc->update($_POST, $_FILES);
}

redirect("dashboard.php?page=track_tampil");
