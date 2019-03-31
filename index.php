<?php 
require_once './bootstrap/bootstrap.php';
require_once 'config.php';
spl_autoload_register(function($class){
	try{
		$filename = "controllers/".$class."_controller.php";
		if(file_exists($filename))
		{
			require_once $filename;
			if(file_exists("models/$class.php"))
			{
				require_once "models/$class.php";
			}
		
		}else{
			throw new Exception("$class Класс не найден в контроллерах и моделях", 1);
		}
	}
	catch(Exception $e){
		echo '<pre>';
		echo $e->getMessage().'<br/>';
		//var_dump($e->getTrace());
		echo '</pre>';

	}
});
$app = new Bootstrap();
//var_dump(get_declared_classes());