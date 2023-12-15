<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Gallery $model */
/** @var ActiveForm $form */
?>
<div class="site-galleryform">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'event_id')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Events::find()->all(), 'id', 'title')) ?>
        <?= $form->field($model, 'image[]')->fileInput(['multiple' => true]) ?>
        <?= $form->field($model, 'author', ['inputOptions'=>['placeholder' => 'Фамилия Имя Отчество', 'class' => 'form-control']])->textInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Подтвердить'), ['class' => 'btn btn-event']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-galleryform -->
