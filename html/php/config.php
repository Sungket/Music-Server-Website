<?php

	// connection details for MySQL database

	$cd_host = "127.0.0.1";
	$cd_port = 3306;
	$cd_socket = "";

	// database name, username and password

	$cd_dbname = "rajAdmin";
	$cd_user = "sungket";
	$cd_password = "saturn";


	class Dbh {
		private $host = "127.0.0.1";
		private $user = "sungket";
		private $pwd = "saturn";
		private $dbname = "rajAdmin";

		protected function connect() {
			$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
			$pdo = new PDO($dsn, $this->user, $this->pwd);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			return $pdo;
		}
	}

?>