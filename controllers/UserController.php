<?php

namespace app\controllers;

use app\models\UserForm;
use app\repository\UsersRepository;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = new UserForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()){
            return $this->goHome();
        }
        return $this->render('login', ['model' => $model]);
    }
}