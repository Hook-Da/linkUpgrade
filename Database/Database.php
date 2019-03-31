<?php 
class Database{
	private static $_instance = null;
	public static $_pdo;
	private function __construct()
	{
		try
		{
			self::$_pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
		}
		catch(PDOexception $e)
		{
			$e->getMessage();
		}
	}
	public static function getInstance()
	{
		if(!isset(self::$_instance))
		{
			self::$_instance = new Database();
		}
		return self::$_instance;
	}
	
}