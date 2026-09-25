<?php

// Config
require_once "inc/config.php";

$ind = new App\Index();

if (isset($_POST['btn-login'])) {
	$login = $ind->login(
		(string) ($_POST['user_name'] ?? ''),
		(string) ($_POST['user_password'] ?? ''),
	);

	redirect($login ? "dashboard.php" : "index.php?page=index_login");
}

redirect("index.php");
