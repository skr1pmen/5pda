<?php

namespace app\controllers;

use app\models\MessageForm;
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
        $title = ForumRepository::getSectionsTitle(Yii::$app->request->get('id'));
        $this->view->title = $title;
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

    public function actionTopics()
    {
        $title = ForumRepository::getSubsectionsTitle(Yii::$app->request->get('id'));
        $this->view->title = $title;
        $topics = ForumRepository::getTopics(Yii::$app->request->get('id'));
        return $this->render("topics", ['topics' => $topics]);
    }

    public function actionCreateTopic()
    {
        $this->view->title = "Темы";

        $model = new SectionForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            ForumRepository::createTopic(
                $model->title,
                $model->description,
                Yii::$app->request->get('id'),
                Yii::$app->user->id
            );
            return $this->goHome();
        }
        return $this->render("createTopic", ['model' => $model]);
    }

    public function actionMessages()
    {
        $title = ForumRepository::getTopicsTitle(Yii::$app->request->get('id'));
        $this->view->title = $title;

        $messages = ForumRepository::getMessages(Yii::$app->request->get('id'));

        $model = new MessageForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            ForumRepository::createMessage(
                $model->text,
                Yii::$app->request->get('id'),
                Yii::$app->user->id
            );
        }

        return $this->render("messages", [
                'messages' => $messages,
                'model' => $model
            ]
        );
    }
}