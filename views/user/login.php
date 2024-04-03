<?php
/** @var $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="form">
    <div class="form__wrapper">
        <h1><?= $this->title ?></h1>
        <?php $form = ActiveForm::begin([
            'class' => 'form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'label'],
                'inputOptions' => ['class' => 'input'],
                'errorOptions' => ['class' => 'error']
            ]
        ]) ?>

        <?= $form->field($model, 'login')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= Html::submitButton("Войти", ['class' => 'btn']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>

