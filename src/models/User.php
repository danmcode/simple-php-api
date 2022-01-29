<?php

class User{

    public function getAllUsers($dataBase)
    {
        $queryBuilder = new QueryBuilder();
        $users = $queryBuilder->Select("SELECT * FROM $dataBase.usuarios");
        return $users;
    }
}