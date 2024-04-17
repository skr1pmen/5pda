<?php
/** @var $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $file = ActiveForm::begin(['options' => [
    'enctype' => 'multipart/form-data'
]]) ?>

<div class="file">
    <label>
        <?= $file->field($model, 'file')->fileInput() ?>
        <div class="btn">da</div>
    </label>
</div>
<?= Html::submitButton('Загрузить') ?>

<?php ActiveForm::end() ?>
