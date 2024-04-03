<?php
/** @var $sections */
?>

<div class="forum_head">
    <h2 class="title">Всего разделов сейчас: <?= count($sections) ?></h2>
    <?php if (!Yii::$app->user->isGuest): ?>
        <a href="/forum/create-section" class="btn">Создать раздел</a>
    <?php endif; ?>
</div>
<div class="forum_sections">
    <?php if ($sections): ?>
        <?php foreach ($sections as $section): ?>
            <a href="/forum/sebsections?id=<?= $section->id ?>" class="forum_section">
                <h3><?= $section->title ?></h3>
                <span><?= $section->desc ?></span>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <div>Здесь пока пусто</div>
    <?php endif; ?>
</div>
