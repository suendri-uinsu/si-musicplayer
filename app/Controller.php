<?php

declare(strict_types=1);

namespace App;

use PDO;
use PDOException;

abstract class Controller
{
	protected PDO $db;

	public function __construct()
	{
		try {
			$this->db = new PDO(DB_DSN, DB_USER, DB_PASS, [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			]);
		} catch (PDOException $e) {
			die('error! ' . $e->getMessage());
		}
	}
}
