<?php 
require './interface/bootInter.php';
class Bootstrap implements BootInter
{
	public function __construct()
	{
		$urlArr = $this->parseUrl();
		if(empty($urlArr[0]))
			{
				$controller = new Index();
				//$controller->index();
				return false;
			}
			$file = 'controllers/'.$urlArr[0].'.php';
			if(file_exists($file))
			{
				require_once $file;
			}
			else
			{
				require_once 'errors/error.php';
				$error = new customErrors('Нет такого файла или такая страница отсутствует - '.$file);
				$error->index();
				return false;
			}
			$controller = new $urlArr[0];
			$controller->loadModel($urlArr[0]);
			if(isset($urlArr[2]))
			{
				$controller->{$urlArr[1]}($urlArr[2]);

			}else{
				if(isset($urlArr[1])){
					$controller->{$urlArr[1]}();
				}else {
					$controller->index();
				}
			}
	}
	public function parseUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url,'/');
			//$url = filter_var($url,FILTER_SANITIZE_URL);
		return $url = explode('/',$url);
	}
}