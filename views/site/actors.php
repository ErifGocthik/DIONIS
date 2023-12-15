<h1 class="w-100 georgia py-3" style="text-align: center">Актёры</h1>
<div style="display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr 1fr">
    <?php use yii\bootstrap5\LinkPager;

    foreach ($actors as $actor) {?>
        <div class="d-flex justify-content-start align-content-start flex-wrap">
            <div style="width: 225px;
                    height: 225px;
                    border-radius: 50%;
                    background-image: url('<?php echo \yii\helpers\Url::to('@web/images').'/'.$actor->image?>');
                    background-position: center;
                    background-size: 105%;
                    border: 5px double rgba(121,76,47,0.29);
                    filter: drop-shadow(0 0 5px #2a1608);"></div>
            <div style="width: 415px; padding: 1% 5%;">
                <h3 class="georgia" style="hyphens: auto"><?php echo $actor->fullname?></h3>
                <p class="georgia" style="hyphens: auto"><?php echo $actor->description?></p>
            </div>
        </div>
    <?php } ?>
</div>
<div class="georgia w-100 d-flex justify-content-center align-content-center" style="filter: hue-rotate(180deg) saturate(30%)">
    <?php echo
        LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>