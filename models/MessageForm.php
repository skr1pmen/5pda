<?php

namespace app\models;

use yii\base\Model;

class MessageForm extends Model
{
    public $text;

    public function rules()
    {
        return [
            ['text', 'required'],
            ['text', 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'text' => "Сообщение"
        ];
    }
}