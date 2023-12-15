<?php use yii\helpers\Url;
?>
<div class="container d-flex justify-content-start align-items-start flex-wrap m-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d72401.21755986189!2d65.30334719999999!3d55.4532864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1702458085508!5m2!1sru!2sru" width="700" height="500" style="border:15px ridge #2A1608A8; filter: drop-shadow(0 0 5px #2A1608A8)" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <div class="px-3" style="width: 40%">
        <h1 class="georgia"><strong>О нас</strong></h1>
        <p class="georgia" style="line-height: 10px"><strong>Телефон: </strong>+7 (999) 999-99-99</p>
        <p class="georgia" style="line-height: 10px"><strong>E-mail: </strong>dionistheatre@mail.ru</p>
        <p class="georgia" style="line-height: 10px"><strong>Адрес: </strong>ул. Каральцева дом 99</p>
        <div style="background-image: url(<?php echo Url::to('@web/images/Director.png') ?>);
                width: 50%;
                height: 300px;
                background-size: 105%;
                filter: drop-shadow(0 0 5px black);
                background-position: center;" class="d-flex justify-content-center align-content-end flex-wrap">
                <p style="color: #dcc6b8; line-height: 0; filter: drop-shadow(0 0 1px #9d826e)" class="georgia"><strong>Директор</strong></p>
                <p style="color: #dcc6b8; line-height: 5px; filter: drop-shadow(0 0 1px #9d826e)" class="georgia">Зайцев Михаил Давидович</p>
        </div>
    </div>
</div>