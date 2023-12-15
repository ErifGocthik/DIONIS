
<div class="buy-ticket" style="background-image: url('../images/ticket.png');
                                background-size: 100%;
                                ">
    <a href="<?php echo \yii\helpers\Url::toRoute(['site/buyticket', 'id'=>$event->id])?>" class="georgia buy-ticket-sound"><strong>Купить Билет</strong></a>
</div>
<div style="height: 500px;
        width: 100%;
        margin-bottom: 15px;
        background-image: url('../images/<?php echo $event->image ?>');
        background-size: 120%;
        background-position: center">
</div>
<div class="d-flex justify-content-start align-content-start">
    <div style="width: 70%">
        <h2 class="w-100 georgia" style="opacity: 80%"><strong>"<?php echo $event->title?>"</strong></h2>
        <p class="georgia" style="opacity: 90%"><?php echo $event->description?></p>
    </div>
    <div style="
                width: 30%;
                padding: 0 0.3%" class="d-flex justify-content-start align-content-start flex-wrap">
        <h4 class="georgia w-100" style="opacity: 80%; margin-top: 10px"><strong>Актёры</strong></h4>
        <ul>
        <?php foreach ($actors as $actor) {?>
        <li style="opacity: 80%">
            <a href="#" class="link" ><?php echo $actor->actor->fullname?></a>
        </li>
        <?php } ?>
        </ul>
        <h4 class="georgia w-100" style="opacity: 80%; margin-top: 10px"><strong>Режиссер</strong></h4>
        <ul>
            <li style="opacity: 80%">
                <a href="#" class="link"><?php echo $event->director ?></a>
            </li>
        </ul>
        <h4 class="georgia w-100" style="opacity: 80%; margin-top: 10px"><strong>Автор идеи</strong></h4>
        <ul>
            <li style="opacity: 80%">
                <a href="#" class="link"><?php echo $event->author ?></a>
            </li>
        </ul>
        <h4 class="georgia w-100" style="opacity: 80%; margin-top: 10px"><strong>Жанр</strong></h4>
        <ul>
            <li style="opacity: 80%">
                <a href="#" class="link"><?php echo $event->style->name ?></a>
            </li>
        </ul>

    </div>
</div>
<?php if (count($galleries) !== 0) {?>
<h1 class="georgia w-100 text-center">Галлерея</h1>
<div class="grid d-flex justify-content-center align-content-start align-items-center" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
    <?php foreach ($galleries as $gallery) { ?>
        <img src="../gallery/<?php echo $gallery->image ?>" style="width: 30%; margin: 0.5%;"
        class="grid-item">
    <?php } ?>
    <?php } ?>
</div>