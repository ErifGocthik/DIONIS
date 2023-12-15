<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ticket $model */
/** @var ActiveForm $form */


function get_mouth_name($mouth)
{
    switch ($mouth) {
        case 1:
            return 'Января';
        case 2:
            return 'Февраля';
        case 3:
            return 'Марта';
        case 4:
            return 'Апреля';
        case 5:
            return 'Мая';
        case 6:
            return 'Июня';
        case 7:
            return 'Июля';
        case 8:
            return 'Августа';
        case 9:
            return 'Сентября';
        case 10:
            return 'Октября';
        case 11:
            return 'Ноября';
        case 12:
            return 'Декабря';
    }
}
?>
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
<h1 class="georgia">Покупка билета на "<?php echo $event->title?>"</h1>
<h2 class="georgia" style="opacity: 80%;">Начало <?php echo intval(date('d', strtotime($event->start)));
                                                    echo'-го';
                                                    echo ' ';
                                                    echo get_mouth_name(intval(date('m', strtotime($event->start))));
                                                    echo ' в ';
                                                    echo date('h', strtotime($event->start));
                                                    echo ':';
                                                    echo date('i', strtotime($event->start))?></h2>
<div class="site-buyticket">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'phone_number', ['inputOptions' => ['autofocus'=>true, 'placeholder'=>'+7 (---) --- -- --', 'class'=>'form-control mask']])->textInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Купить билет'), ['class' => 'btn-post btn btn-event georgia']) ?>
        </div>
    <?php ActiveForm::end(); ?>


    <div class="d-flex justify-content-start align-items-start flex-wrap w-100">
        <h4 class="georgia" style="padding-right: 5px;">Места которые вы выбрали: </h4>
        <h4 class="places-selected georgia"></h4>
    </div>
</div><!-- site-buyticket -->
<div class="container">
    <h2 class="georgia text-center py-3" style="opacity: 60%;
                                                width: 77%;
                                                border: 13px ridge rgba(42,22,8,0.66);
                                                margin-bottom: 50px">СЦЕНА</h2>
    <div class="places">
        <div class="places-block">
            <?php
            foreach (array_slice($places, 0, 48) as $item) { ?>
                <p class="place place_id_<?php echo $item['id']?>"
                id="<? foreach ($ticket as $item_t) {
                    $value = explode(',', $item_t->place_id);
                    foreach ($value as $val) {
                        if ($val == $item['id'] && $_GET['id'] == $item_t['event_id']) {
                            echo 'gr-scale-100';
                        }
                    }
                } ?>">
                    <?php echo $item['name'] ?>
                </p>
            <?php } ?>
        </div>
        <div class="places-block">
            <?php
            foreach (array_slice($places, 48, 48) as $item) { ?>
                <p class="place place_id_<?php echo $item['id'] ?>"
                   id="<? foreach ($ticket as $item_t) {
                       $value = explode(',', $item_t->place_id);
                       foreach ($value as $val) {
                           if ($val == $item['id'] && $_GET['id'] == $item_t['event_id']) {
                               echo 'gr-scale-100';
                           }
                       }
                   } ?>"><?php echo $item['name'] ?></p>
            <?php } ?>
        </div>
        <div class="places-block">
            <?php
            foreach (array_slice($places, 96, 48) as $item) { ?>
                <p class="place place_id_<?php echo $item['id'] ?>"
                   id="<? foreach ($ticket as $item_t) {
                       $value = explode(',', $item_t->place_id);
                       foreach ($value as $val) {
                           if ($val == $item['id'] && $_GET['id'] == $item_t['event_id']) {
                               echo 'gr-scale-100';
                           }
                       }
                   } ?>"><?php echo $item['name'] ?></p>
            <?php } ?>
        </div>
    </div>

</div>