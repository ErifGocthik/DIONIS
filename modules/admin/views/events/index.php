<style>
    body
    {
        font-family: Georgia, sans-serif;
    }
</style>
<?php

use app\models\Events;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\EventsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'События');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index" style="filter: hue-rotate(180deg) saturate(40%)">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить Событие'), ['create'], ['class' => 'btn btn-event', 'style'=>['filter'=>'hue-rotate(180deg)']]) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'image',
            'author',
            'director',
//            'age_id',
            ['attribute'=>'age_id',
                'value'=>'age.age'],
            'duration',
            'idea',
            'street',
            'start',
//            'style_id',
            ['attribute'=>'style_id',
                'value'=>'style.name'],
            'count_of_tickets',
            'price',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Events $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
