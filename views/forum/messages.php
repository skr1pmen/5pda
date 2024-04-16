<?php
/**
 * @var $messages
 * @var $topicAuthor
 * @var $model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//var_dump($messages);
//var_dump($model);
?>

<div>
    <div class="topic_title">
        <?= $this->title ?><br/>
        <?= 'Автор: ' . $topicAuthor ?>
    </div>

    <div class="messages">
        <?php foreach ($messages as $message): ?>
            <div class="message">
                <?= $message->date ?>
                <h3>
                    <?= $message->user->login ?>
                </h3>
                <span>
                    <?= $message->text ?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="message__wrapper">
        <?php $msg = ActiveForm::begin() ?>
        <?= $msg->field($model, 'text')->textarea(['placeholder' => "Ваше сообщение"]) ?>
        <?= Html::submitButton('✏', ['class' => 'msgBtn']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>
