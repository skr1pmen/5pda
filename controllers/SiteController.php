<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\FileModel;
use app\models\LoginForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $model = new FileModel();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
                $file = Yii::$app->user->id . '.' . $model->file->extension;
                $model->file->saveAs("images/$file");
            }
        }
        return $this->render('index', ['model' => $model]);
    }
}
