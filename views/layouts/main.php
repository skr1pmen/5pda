<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <div class="container">
        <a href="./" class="logo">5pda</a>
        <nav>
            <ul>
                <li><a href="#">Случайная тема</a></li>
                <?php if (Yii::$app->user->isGuest): ?>
                    <li><a href="/user/login">Войти</a></li>
                    <li><a class="btn" href="/user/registration">Регистрация</a></li>
                <?php else: ?>
                    <?= '<li>' .
                    Html::beginForm(['/user/logout']) .
                    Html::submitButton('Выход (' . Yii::$app->user->identity->login . ')', ['class' => 'btn']) .
                    Html::endForm() .
                    '</li>'
                    ?>

                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="container">
        <?= $content ?>
    </div>
</main>

<footer>
    <div class="container">
        ©5pda <?= date('Y') ?>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
