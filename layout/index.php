<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SI Music Player</title>
	<link rel="stylesheet" type="text/css" href="<?= ASSET ?>css/style.css">
	<link href="<?= ASSET ?>images/favicon.ico" rel="shortcut icon">
</head>
<body>
	<div class="container">
		<div class="header">
			<img src="<?= ASSET ?>images/header.jpg" alt="SI Music Player">
		</div>

		<div class="menu">
			<a href="index.php">Home</a>
			<a href="index.php?page=index_album">Album</a>
			<a href="index.php?page=index_login">Login</a>
		</div>

		<div class="main">
			
			<?php include __DIR__ . "/../" . $page . ".php"; ?>

		</div>

		<div class="footer">
			Copyright 2020-<?= date('Y') ?>. SI Music Player
		</div>
	</div>
</body>
</html>