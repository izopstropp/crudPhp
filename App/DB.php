<?php

namespace App;
class DB {
    private static $instance;

    public static function getInstance(){        
        
        if(!isset(self::$instance)){
            self::$instance = new \PDO('mysql:host=127.0.0.1;dbname=projet-fit-poli','root','');
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }

    public static function prepare($sql){
        return self::prepare($sql);
    }
}