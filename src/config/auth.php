<?php

class Auth{

    public  function Authenticate($request){

        $dotenv = Dotenv\Dotenv::createImmutable('./');

        $dotenv->load();
        
        $apikey = $_ENV['APP_KEY'];

        ($apikey == $request) ? $authenticated = true : $authenticated = false;
    
        return $authenticated;
    }
}