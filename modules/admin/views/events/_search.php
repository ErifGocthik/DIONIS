<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\EventsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'director') ?>

    <?php // echo $form->field($model, 'age_id') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'idea') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'start') ?>

    <?php // echo $form->field($model, 'style_id') ?>

    <?php // echo $form->field($model, 'count_of_tickets') ?>

    <?php // echo $form->field($model, 'price') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
