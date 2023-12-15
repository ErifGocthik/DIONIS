<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Events $model */
/** @var ActiveForm $form */
?>

<style>
    .form-control
    {
        filter: hue-rotate(180deg);
    }
</style>
<div class="site-newEvent">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'title', ['inputOptions'=>['placeholder'=>'Название события', 'class'=>'form-control']])->textInput()?>
        <?= $form->field($model, 'image')->fileInput() ?>
        <?= $form->field($model, 'author', ['inputOptions'=>['autofocus'=>true, 'class'=>'form-control', 'placeholder'=>'Автор']])->textInput() ?>
        <?= $form->field($model, 'director', ['inputOptions'=>['class'=>'form-control', 'placeholder'=>'Директор']])->textInput() ?>
        <?= $form->field($model, 'idea', ['inputOptions'=>['class'=>'form-control', 'placeholder'=>'Автор идеи']])->textInput() ?>
        <?= $form->field($model, 'age', ['inputOptions'=>['class'=>'form-control', 'placeholder'=>'Возраст']])->textInput()->dropDownList(['1' => '0+', '2'=>'6+', '3'=>'12+', '4'=>'16+', '5'=>'18+']) ?>
        <?= $form->field($model, 'duration', ['inputOptions'=>['class'=>'form-control duration', 'placeholder'=>'1 час 30 мин.']])->textInput() ?>
        <?= $form->field($model, 'description', ['inputOptions'=>['class'=>'form-control', 'placeholder'=>'Описание']])->textarea() ?>
        <?= $form->field($model, 'street', ['inputOptions'=>['class'=>'form-control', 'placeholder'=>'Улица']])->textInput()->dropDownList(['Дворец культуры машиностроителей, К. Маркса, 70']) ?>
        <?= $form->field($model, 'style_id', ['inputOptions'=>['class'=>'form-control', 'placeholder'=>'Жанр']])->textInput()->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Style::find()->all(), 'id', 'name')) ?>
        <?= $form->field($model, 'count_of_tickets', ['inputOptions'=>['placeholder'=>'144 или меньше', 'class'=>'form-control']])->textInput() ?>
        <?= $form->field($model, 'start', ['inputOptions'=>['class'=>'date-form form-control', 'placeholder'=>'2023-12-07 11:00:00']])->textInput() ?>
        <?= $form->field($model, 'price', ['inputOptions'=>['placeholder'=>'500', 'class'=>'form-control']])->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Создать'), ['class' => 'btn btn-event georgia']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-newEvent -->
