<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;
use yii\helpers\Url;

$this->title = 'DIONIS';
?>
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <?php foreach ($slider as $event) { ?>
            <div class="carousel-item <?php if (count($slider) == $event->id) { ?>active<?php } ?>">
                <img src="<?= Url::to('@web/images') ?>/<?= $event->image ?>" class="d-block w-100" alt="..." style="max-height: 115vh">
                <h1 style="position: relative; top: -850px; left: 1vw; filter: drop-shadow(0px 0px 2px #341c15)" class="title">
                    <strong>"<?php echo $event->title ?>"</strong></h1>
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Предыдущий</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Следующий</span>
    </button>
</div>
<h1 class="event-title w-100 text-center">Спектакли</h1>
<div class="container">
    <?php foreach ($events as $event) { ?>
        <div class="event d-flex justify-content-start align-items-start flex-wrap"
             style="width: 100%; height: auto; margin: 3vh 0; border-radius: 0.5rem; overflow: hidden; background: linear-gradient(90deg ,#988371, #b09a83)">
            <div class="event-img" style="background-image: url('<?= Url::to('@web/images') ?>/<?= $event->image ?>');
                    background-position: center;
                    background-size: 120%;
                    width: 25%;
                    height: 230px;
                    margin: 0.5%;
                    border-radius: 0.5rem">

            </div>
            <div class="event-content d-flex justify-content-start align-items-start align-content-between flex-wrap"
                 style="width:72%; height: 240px; margin-left: 0.5vw">
                <div>
                    <h4 class="event-title w-100" style="margin: 10px 0 0 0"><?php echo $event->title ?></h4>
                    <p class="event-text w-100" style="margin: 0;"><strong>Автор:</strong> <?php echo $event->author ?></p>
                    <p class="event-text w-100" style="margin: 0;"><strong>Возвраст:</strong> <?php echo $event->age->age ?></p>
                    <?php if (strlen($event->description) <= 787) { ?>
                        <p class="event-text"><?php echo $event->description ?></p>
                    <?php } else { ?>
                        <p class="event-text" style="opacity: 90%"><?php echo substr($event->description, 0, 787) ?>
                            ...</p>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-end w-100">
                    <a href="<?php echo \yii\helpers\Url::toRoute(['site/event', 'id'=>$event->id])?>" class="btn btn-event" style="margin-bottom: 10px">Подробнее</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
    <div class="georgia w-100 d-flex justify-content-center align-content-center" style="filter: hue-rotate(180deg) saturate(30%)">
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);?>
</div>

