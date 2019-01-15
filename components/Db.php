<?php
/*
class Db
{

		public static function getConnection()
		{
			echo "Connect";
			$paramsPath = ROOT . '/config/db_params.php';
			$params = include($paramsPath);


			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password']);

			return $db;
		}
}
*/

class Db {

	private $_connection = null;

	private function __construct(){
			echo "Connect";
			$paramsPath = ROOT . '/config/db_params.php';
			$params = include($paramsPath);


			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$this->_connection = new PDO($dsn, $params['user'], $params['password']);
	}
	private function __clone(){}

	private static $_instance = null;

	public static function getInstance(){
		if (self::$_instance == null) self::$_instance = new self();
		return self::$_instance;
	}

	public function getConnection(){
		return $this->_connection;
	}

}

