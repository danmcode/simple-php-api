<?php

class UserController{

    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getAllUser(){
        $users = $this->user->getAllUsers('notas_master');
        is_array($users) 
        ? JsonResponse::successResponse(200, $users)
        : JsonResponse::errResponse(400, [], $users);
    }
}