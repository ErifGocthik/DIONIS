<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Actors $model */
/** @var ActiveForm $form */
?>
<div class="site-test">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_id') ?>
    <?= $form->field($model, 'actor', ['inputOptions'=>['class'=>'form-control', 'multiple'=>true]])->listBox(\yii\helpers\ArrayHelper::map(\app\models\Actor::find()->all(), 'id', 'fullname')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-test -->