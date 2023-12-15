<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/dioicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <script src="/dionis/web/js/masonry.pkgd.min.js">
        $('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 200
        });
    </script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100" style="background: #fadfc0;">
<?php $this->beginBody() ?>

<?php

?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark header_gradient_db_b_db fixed-top dionis']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav header-navbar'],
        'items' => [
            ['label' => 'Спектакли', 'url' => ['/']],
            ['label' => 'Актёры', 'url' => ['/site/actors']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            Yii::$app->user->isGuest?'':(Yii::$app->user->identity->isAdmin()?['label'=>'Регистрация пользователя', 'url'=>['/site/signup']]:''),
            Yii::$app->user->isGuest?'':['label'=>'Создать новое событие', 'url'=>['/site/newevent']],
            Yii::$app->user->isGuest?'':['label'=>'Добавить галерею', 'url'=>['/site/galleryform']],
            Yii::$app->user->isGuest
                ? ['label' => 'Войти' , 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main" style="min-height: 93.3vh">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<!--<footer id="footer" class="mt-auto py-3 bg-light">-->
<!--    <div class="container">-->
<!--        <div class="row text-muted">-->
<!--            <div class="col-md-6 text-center text-md-start">&copy; My Company --><?//= date('Y') ?><!--</div>-->
<!--            <div class="col-md-6 text-center text-md-end">--><?//= Yii::powered() ?><!--</div>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<footer style="background-color: #2a1608; align-items: end; width: 100%; padding-top: 6px; height: 50px">
    <p class="dionis w-100" style="color: #3f230f; text-align: center; font-size: 28px!important; filter: drop-shadow(0 0 1px #311b0b);">©DIONIS2024</p>
</footer>
