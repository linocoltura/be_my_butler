<?php

abstract class Db{

    private static $conn = NULL;

    public static function getInstance(){
        if (isset(self::$conn)){
            return self::$conn;
        }
        else{
            self::$conn = new PDO('mysql:host=localhost; dbname=bemybutler','root','');
            return self::$conn;
        }
    }

}