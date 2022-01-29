<?php

class Database{

    public static function Connect(){
        
        $dotenv = Dotenv\Dotenv::createImmutable('./');
        $dotenv->load();

        $server     = $_ENV['DB_HOST'];
        $user       = $_ENV['DB_USERNAME'];
        $password   = $_ENV['DB_PASSWORD'];

        $connection = new mysqli($server, $user, $password);
        $connection->query("SET NAMES 'utf8'");

        return $connection;

    }
}