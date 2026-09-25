<?php

// Config
require_once "inc/config.php";

wajibLogin();

$alb = new App\Album();

if (isset($_POST['btn-simpan'])) {
	$alb->input($_POST);
} elseif (isset($_POST['btn-update'])) {
	$alb->update($_POST);
}

redirect("dashboard.php?page=album_tampil");
