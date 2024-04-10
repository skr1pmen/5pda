<?php
/** @var $topics */
?>

<div class="forum_head">
    <h2 class="title">Всего тем сейчас: <?= count($topics) ?></h2>
    <?php if (!Yii::$app->user->isGuest): ?>
        <a href="/forum/create-topic?id=<?= Yii::$app->request->get('id') ?>" class="btn">Создать тему</a>
    <?php endif; ?>
</div>
<div class="forum_sections">
    <?php if ($topics): ?>
        <?php foreach ($topics as $topic): ?>
            <a href="/forum/messages?id=<?= $topic->id ?>" class="forum_section">
                <h3><?= $topic->title ?></h3>
                <span><?= $topic->description ?></span>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <div>Здесь пока пусто</div>
    <?php endif; ?>
</div>
