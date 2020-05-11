<?php
require_one 'config.php';

class db{
	private static $instance;

	public static function getInstance(){

		if(!isset(self::$instance){
			try{
				self::$instance = new PDO('mysql:host=' .DB_HOST . dbname .DB_NAME
				self::$instance->setAttrbute(PDO::ATTR_ERRMODE. PDO::ERROMODE_EXC new PDO('mysql:host=' .DB_HOST . dbname .DB_NAME

}
		
	

}

?>
