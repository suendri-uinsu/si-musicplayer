<?php

// Config
require_once "inc/config.php";

wajibLogin();

$user = new App\User();

if (isset($_POST['btn-simpan'])) {
	$user->input($_POST);
} elseif (isset($_POST['btn-update'])) {
	$user->update($_POST);
}

redirect("dashboard.php?page=user_tampil");
