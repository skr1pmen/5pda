<?php

namespace app\repository;

use app\entity\Users;

class UsersRepository
{
    public static function getUserById($id)
    {
        return Users::find()->where(['id' => $id])->one();
    }

    public static function getUserByLogin($login)
    {
        return Users::find()
            ->where(['login' => $login])
            ->one();
    }

    public static function createUser($login, $password)
    {
        $user = new Users();
        $user->login = $login;
        $user->password = $password;
        $user->save();
        return $user->id;
    }
}