<?php 
class Indexm extends mainModel
{
	public function __construct(Database $dbObject)
	{
		parent::$db = $dbObject;
	}
}