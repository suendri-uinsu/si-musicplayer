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
		<div class="menu">
			<a href="dashboard.php">Dashboard</a>
			<a href="dashboard.php?page=artist_tampil">Artis</a>
			<a href="dashboard.php?page=album_tampil">Album</a>
			<a href="dashboard.php?page=track_tampil">Lagu</a>
			<a href="dashboard.php?page=user_tampil">User</a>
			<a href="user_logout.php">Logout</a>
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