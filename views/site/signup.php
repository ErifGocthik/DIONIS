<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SignupForm $model */
/** @var ActiveForm $form */


$this->title = 'Регистрация сотрудника';
?>
<!--<style>-->
<!--    .control-label-->
<!--    {-->
<!--        font-family: Georgia, sans-serif;-->
<!--    }-->
<!--    form-->
<!--    {-->
<!--        filter: hue-rotate(180deg);-->
<!--        font-family: Georgia, sans-serif;-->
<!--    }-->
<!--</style>-->
<style>
    .control-label
    {
        font-family: Georgia, sans-serif;
    }
    .form-control
    {
        filter: hue-rotate(180deg);
        font-family: Georgia, sans-serif;
    }
</style>
<div class="site-login">
    <h1 class="georgia"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'signup-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username', ['inputOptions' => ['placeholder'=>'Имя Пользователя']])->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'full_name', ['inputOptions' => ['placeholder'=>'Фамилия Имя Отчество']])->textInput() ?>
            <?= $form->field($model, 'email', ['inputOptions' => ['placeholder'=>'Эл. почта']])->textInput() ?>
            <?= $form->field($model, 'phone_number', ['inputOptions' => ['placeholder'=>'Номер телефона', 'class'=>'form-control mask']])->textInput() ?>


            <?= $form->field($model, 'password', ['inputOptions' => ['placeholder'=>'Пароль']])->passwordInput() ?>
            <?= $form->field($model, 'password_repeat', ['inputOptions' => ['placeholder'=>'Повтор пароля']])->passwordInput() ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Зарегистрировать', ['class' => 'btn-event btn georgia', 'name' => 'signup-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
