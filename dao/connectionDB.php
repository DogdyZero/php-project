<?php
require_once '../configuracao/enviroment.php';
class ConnectionDB{
    private static $instance;

    public function getInstance(){
        if(!isset(self::$instance)){
            try {
                self::$instance = new PDO('mysql:host='. DB_HOST .';dbname='.DB_NAME.'', DB_USER, DB_PASS);
                // set the PDO error mode to exception
                
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);   
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
	}
}
?>