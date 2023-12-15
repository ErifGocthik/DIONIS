<style>
    body
    {
        font-family: Georgia, sans-serif;
    }
</style>
<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Events $model */

$this->title = Yii::t('app', 'Изменить событие: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="events-update" style="filter: saturate(40%)">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
