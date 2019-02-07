<?php
require_once './interface/mainControlInter.php';
require_once './Database/Database.php';  

abstract class mainControlAbstract implements mainControlInter
{
	protected $view = null;
	private static $LOADED = false;
	public function __construct($viewObject)
	{
		$this->view = $viewObject;
	}
	public function getLoadedConnection()
	{
		return self::$LOADED;
	}
	public function loadDb()
	{
		self::$LOADED = true;
		new Indexm(Database::getInstance());
	}
	public function loadModel($name)
	{
		
	}
	public function store(){}
	public function edit(){}
	public function show(){}
	public function delete(){}
}