<?php

use yii\helpers\Url; 
?>
<header>
    <div class="row">
        <!--.header-top-bar(data-magellan-expedition='fixed')-->
        <div class="header-top-bar">
            <div class="large-2 medium-2 small-2 columns show-for-small"><i class="md md-more-vert left-off-canvas-toggle"></i></div>
            <div class="large-2 medium-2 small-2 columns"><a href="./" class="logo">TSS</a></div>
            <div class="large-5 medium-5 small-5 columns show-for-medium-up">
                <nav class="main-nav">
                    <ul>
                        <li><a href="./" class="active">Home</a></li>
                        <li><a href="./store">Store</a></li>
                        <li><a href="./articles">Articles</a></li>
                    </ul>
                </nav>
            </div>
            <div class="large-3 medium-3 small-3 columns">
                <form action="/products">
                    <input type="search" name="key" placeholder="Search">
                </form>
            </div>
            <div class="large-2 medium-2 small-2 columns show-for-medium-up">
                <div class="shopping-cart"><i class="icon-cart"></i></div>
                <div class="user-avatar"><img src="http://lorempixel.com/50/50/people" alt=""></div>
                <div class="lang-switcher">
                    <div class="language-switcher">AR</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="header-slider swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($this->params['homeSlider']->media as $oMedia){?>
                <div class="header-product swiper-slide">
                    <img src="<?= $oMedia->getImgUrl('home-slider') ?>" alt="">
                    <h2><?= $oMedia->title ?></h2>
                    <p><?= $oMedia->description ?></p>
                    <a href="<?= $oMedia->link ?>" class="shop-now"><i class="md md-shopping-cart"></i><?= Yii::t('app', 'Shop Now') ?></a>
                </div>
                <?php } ?>
<!--                <div class="header-product swiper-slide"><img src="<?= Url::to('@frontThemeUrl') ?>/images/src/home-slide-3.png" alt="">
                    <h2>The BSN Push Training Guide</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quod numquam sit magni expedita.</p><a href="#" class="shop-now"><i class="md md-shopping-cart"></i>Shop Now 3</a>
                </div>-->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</header>