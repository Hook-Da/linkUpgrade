<?php
//database.php 
	define('DB_TYPE','mysql');
	define('DB_HOST','localhost');
	define('DB_NAME','links');
	define('DB_USER','root');
	define('DB_PASS','');

	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";// without https://
	/**
	 * $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	 */
	//path.php
	define('URL',$actual_link);
