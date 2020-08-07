<?php

abstract class Model 
{
    private static $pdo;
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_HOST ='localhost';
    const DB_NAME = 'php-cour-api-animaux;charset=utf8mb4';

    private static function setBdd(){
        self::$pdo = new PDO('mysql:host='.Model::DB_HOST.'; dbname='.Model::DB_NAME, Model::DB_USER, Model::DB_PASSWORD);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    }

    public static function getBdd(){
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
        
    }


    public static function sendJson($data){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        echo json_encode($data,JSON_UNESCAPED_UNICODE );

    }


}