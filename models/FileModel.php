<?php

namespace app\models;

use yii\base\Model;

class FileModel extends Model
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false]
        ];
    }
}