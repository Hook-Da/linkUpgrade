<?php
//require_once './interface/mainModalInter.php';
abstract class mainModel
{
	public static $db = null;
	private static $_query = null;
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
	private static function execute($sql,$params = null)
	{
		self::$_query = self::$db->_pdo->prepare($sql);
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
}