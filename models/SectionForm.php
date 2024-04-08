<?php

namespace app\models;

use yii\base\Model;

class SectionForm extends Model
{
    public $title;
    public $description;

    public function rules()
    {
        return [
            [['title', 'description'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание'
        ];
    }
}