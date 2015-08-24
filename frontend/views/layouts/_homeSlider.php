<div id="checkpoint-a" class="header-slider swiper-container">
    <div class="swiper-wrapper">
        <?php foreach (\common\models\custom\Page::getHomeSlider()->media as $oMedia) { ?>
            <div class="header-product swiper-slide" onclick="javascript:location = '<?= $oMedia->link ?>'">
                <img src="<?= $oMedia->getImgUrl('home-slider') ?>" alt="">
                <!--
                <h2><?php //echo $oMedia->title ?></h2>
                <p><?php //echo $oMedia->description ?></p>
                -->
            </div>
        <?php } ?>
    </div>
    <div class="swiper-pagination"></div>
</div>
