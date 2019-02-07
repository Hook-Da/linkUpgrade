<?php
require_once './bootstrap/view.php';

class Index extends mainControlAbstract
{
	private $popular = null;
	public function __construct()
	{
		parent::__construct(View::create());
		if(!$this->getLoadedConnection())
		$this->loadDB();
		$popular = Popular::all();
		$links = Links::all();
		
		//echo '<pre>';
		//var_dump($popular,$links);
		$this->view->render('index',$popular,$links);
	}
}