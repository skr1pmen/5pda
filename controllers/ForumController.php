<?php

namespace app\controllers;

use app\models\SectionForm;
use app\repository\ForumRepository;
use Yii;
use yii\web\Controller;

class ForumController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = "Главная страница";
        return $this->render("index", [
            'sections' => ForumRepository::getSections()
        ]);
    }

    public function actionCreateSection()
    {
        $this->view->title = 'Создание раздела';
        $model = new SectionForm();
        if ($model->load(Yii::$app->request->post() && $model->validate())) {
            ForumRepository::createSection(
                $model->title,
                $model->desc
            );
            return $this->goHome();
        }
        return $this->render("createSection", [
            'model' => $model
        ]);
    }
}