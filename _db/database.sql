-- Database untuk SI Music Player (MySQL 8 / MariaDB 10.6+)
-- CREATE DATABASE dbmusicplayer CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE tb_artist (
	artist_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
	artist_name VARCHAR(100) NOT NULL,
	PRIMARY KEY(artist_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_album (
	album_id INT NOT NULL AUTO_INCREMENT,
	album_name VARCHAR(100) NOT NULL,
	album_id_artist TINYINT UNSIGNED NOT NULL,
	PRIMARY KEY(album_id),
	UNIQUE KEY(album_name),
	FOREIGN KEY(album_id_artist) REFERENCES tb_artist(artist_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_track (
	track_id INT NOT NULL AUTO_INCREMENT,
	track_name VARCHAR(255) NOT NULL,
	track_id_album INT NOT NULL,
	track_time VARCHAR(10) NOT NULL DEFAULT '00:00',
	track_file VARCHAR(255) DEFAULT NULL,
	PRIMARY KEY(track_id),
	UNIQUE KEY(track_name),
	FOREIGN KEY(track_id_album) REFERENCES tb_album(album_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_played (
	play_id INT NOT NULL AUTO_INCREMENT,
	play_id_track INT NOT NULL,
	play_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(play_id),
	FOREIGN KEY(play_id_track) REFERENCES tb_track(track_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_users (
	user_id INT NOT NULL AUTO_INCREMENT,
	user_name VARCHAR(100) NOT NULL,
	user_password VARCHAR(255) NOT NULL,
	user_email VARCHAR(100) NOT NULL,
	user_nama_lengkap VARCHAR(100) NOT NULL,
	user_role CHAR(1) NOT NULL DEFAULT '2',
	PRIMARY KEY(user_id),
	UNIQUE KEY(user_name),
	UNIQUE KEY(user_email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- User awal: username "admin", password "admin" (segera ganti setelah login)
INSERT INTO tb_users (user_name, user_password, user_email, user_nama_lengkap, user_role)
VALUES ('admin', '$2y$12$DDweSRoc/NfX3YasvtLoIu7j0To6A70cUWAYQqwKlYvVXy6PricnO', 'admin@localhost', 'Administrator', '1');
