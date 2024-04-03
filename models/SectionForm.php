<?php

namespace app\models;

use yii\base\Model;

class SectionForm extends Model
{
    public $title;
    public $desc;

    public function rules()
    {
        return [
            [['title', 'desc'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'desc' => 'Описание'
        ];
    }
}