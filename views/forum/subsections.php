<?php
/** @var $subsections */
?>

<div class="forum_head">
    <h2 class="title">Всего подразделов сейчас: <?= count($subsections) ?></h2>
    <?php if (!Yii::$app->user->isGuest): ?>
        <a href="/forum/create-subsection?id=<?= Yii::$app->request->get('id') ?>" class="btn">Создать подраздел</a>
    <?php endif; ?>
</div>
<div class="forum_sections">
    <?php if ($subsections): ?>
        <?php foreach ($subsections as $subsection): ?>
            <a href="/forum/topics?id=<?= $subsection->id ?>" class="forum_section">
                <h3><?= $subsection->title ?></h3>
                <span><?= $subsection->description ?></span>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <div>Здесь пока пусто</div>
    <?php endif; ?>
</div>
