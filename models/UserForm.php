<?php

namespace app\models;

use app\entity\Users;
use app\repository\UsersRepository;
use Yii;
use yii\base\Model;

class UserForm extends Model
{
    public $login;
    public $password;
    public $_user;

    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            ['password', 'validatePassword'],
//            ['login', 'label' => 'Логин'],
//            ['password', 'label' => 'Пароль'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()){
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)){
                $this->addError($attribute, "Ошибка в логине или пароле");
            }
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findUserByLogin($this->login);
        }
        return $this->_user;
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }
}