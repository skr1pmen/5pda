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
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            ForumRepository::createSection(
                $model->title,
                $model->description
            );
            return $this->goHome();
        }
        return $this->render("createSection", [
            'model' => $model
        ]);
    }

    public function actionSubsections()
    {
        $this->view->title = "Страница подразделов";
        return $this->render("subsections", [
            'subsections' => ForumRepository::getSubsections(Yii::$app->request->get('id'))
        ]);
    }

    public function actionCreateSubsection()
    {
        $this->view->title = 'Создание подраздела';
        $model = new SectionForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            ForumRepository::createSubsection(
                $model->title,
                $model->description,
                Yii::$app->request->get('id')
            );
            return $this->goHome();
        }
        return $this->render("createSubsection", [
            'model' => $model
        ]);
    }
}