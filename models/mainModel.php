<?php
//require_once './interface/mainModalInter.php';
require_once './Database/Database.php'; 

abstract class mainModel
{
	public static $db = null;
	private static $_query = null;
	public static $table;
	public function __construct()
	{
		//isset(!self::$db) ? self::$db = DB::getInstance():self::$db;
	}
	public static function all()
	{
		$model = new static();
		$table = get_class($model);
		$query = "SELECT * FROM `$table`";
		//var_dump('here');die();
		return self::execute($query);
	}
	/*
	* Финальная функция для выполнения sql
	*/
	private static function execute($sql,$params = null)
	{
		if(!self::$db)
		{
			self::$db = Database::getInstance();
		}
		//return $sql;
		self::$_query = self::$db::$_pdo->prepare($sql);
		if(@count($params))
		{
			$x = 1;
			foreach($params as $param)
			{
				self::$_query->bindValue($x++,$param);
			}
		}
			self::$_query->execute();
			return self::$_query->fetchALL(PDO::FETCH_OBJ);
	}
	/*
	* @param $arrKey = [key => value] где ключ поле по которому нужно выбрать из таблицы, а
	* значение значение по которому искать и удалить
	*/
	public static function delete($arrKey)
	{
		$table = static::$table;
		$key = array_keys($arrKey)[0];
		$sql = "DELETE FROM $table WHERE $key LIKE '$arrKey[$key]%'";
		self::execute($sql);
		return true;
	}
}