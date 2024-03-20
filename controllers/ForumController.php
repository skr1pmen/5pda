<?php

namespace app\controllers;

use yii\web\Controller;

class ForumController extends Controller
{
    public function actionIndex()
    {
        return $this->render("index");
    }
}