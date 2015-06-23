<?php

use yii\helpers\Url;

$isHome = Yii::$app->controller->action->id == 'home';
?>
<header class="<?php echo $isHome ? '' : 'single-header'; ?>">
    <div class="row">
        <!--.header-top-bar(data-magellan-expedition='fixed')-->
        <div class="header-top-bar">
            <div class="large-2 medium-2 small-2 columns show-for-small"><i class="md md-more-vert left-off-canvas-toggle"></i></div>
            <div class="large-2 medium-2 small-2 columns"><a href="/" class="logo">TSS</a></div>
            <div class="large-5 medium-5 small-5 columns show-for-medium-up">
                <nav class="main-nav">
                    <ul>
                        <li><a href="<?= Url::home() ?>" class="active">Home</a></li>
                        <li><a href="<?= Url::to(['/store']) ?>" data-drop-down="#store-dropdown">Store</a></li>
                        <li><a href="<?= Url::to(['/articles']) ?>" data-drop-down="#articles-dropdown">Articles</a></li>
                    </ul>
                </nav>
            </div>
            <div class="large-3 medium-3 small-3 columns">
                <form action="<?= Url::to(['/store/search']) ?>">
                    <i class="md md-search" onclick="$(this).parent('form').submit()" value></i>
                    <input type="search" name="SearchForm[key]" placeholder="Search">
                </form>
            </div>
            <div class="large-2 medium-2 small-2 columns show-for-medium-up">
                <div class="shopping-cart">
                    <span>25</span>
                    <i class="icon-cart"></i>
                </div>
                <div class="user-avatar"><img src="http://lorempixel.com/50/50/people" alt=""></div>
                <div class="lang-switcher" data-route="/ar">
                    <div class="language-switcher">AR</div>
                </div>
            </div>

            <div id="articles-dropdown" class="drop-down">
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns articles-cont">

                        <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="/path/to/article">
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
                            </div>
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                            </div>
                        </div>
                        <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="/path/to/article">
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
                            </div>
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                            </div>
                        </div>
                        <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="/path/to/article">
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
                            </div>
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                            </div>
                        </div>
                        <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="/path/to/article">
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
                            </div>
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                            </div>
                        </div>
                        <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="/path/to/article">
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
                            </div>
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                            </div>
                        </div>
                        <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="/path/to/article">
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
                            </div>
                            <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div id="store-dropdown" class="drop-down">
                <div class="row">
                    <div class="large-3 medium-3 small-3 columns tabs-cont">
                        <ul data-tab>
                            <li><a href="#header-tabs--1" class="active">Muscle Building</a></li>
                            <li><a href="#header-tabs--2">Weight Gaining</a></li>
                            <li><a href="#header-tabs--3">Pre-Workout</a></li>
                            <li><a href="#header-tabs--4">Weight Loss</a></li>
                            <li><a href="#header-tabs--5">Health &amp; Wellness</a></li>
                            <li><a href="#header-tabs--6">Accessories</a></li>
                            <li><a href="#header-tabs--7">Brands</a></li>
                        </ul>
                    </div>
                    <div class="large-9 medium-9 small-9 columns content active products-cont" id="header-tabs--1">
                        <div class="large-4 medium-4 small-4 columns dropdown-product-item">
                            <div class="large-5 medium-5 small-5 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
                            </div>
                            <div class="large-7 medium-7 small-7 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                                <a href="#" class="more-on-this-product">Find out more <i class="md md-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="large-4 medium-4 small-4 columns dropdown-product-item">
                            <div class="large-5 medium-5 small-5 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
                            </div>
                            <div class="large-7 medium-7 small-7 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                                <a href="#" class="more-on-this-product">Find out more <i class="md md-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="large-4 medium-4 small-4 columns dropdown-product-item">
                            <div class="large-5 medium-5 small-5 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
                            </div>
                            <div class="large-7 medium-7 small-7 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                                <a href="#" class="more-on-this-product">Find out more <i class="md md-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="large-4 medium-4 small-4 columns dropdown-product-item">
                            <div class="large-5 medium-5 small-5 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
                            </div>
                            <div class="large-7 medium-7 small-7 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                                <a href="#" class="more-on-this-product">Find out more <i class="md md-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="large-4 medium-4 small-4 columns dropdown-product-item">
                            <div class="large-5 medium-5 small-5 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
                            </div>
                            <div class="large-7 medium-7 small-7 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                                <a href="#" class="more-on-this-product">Find out more <i class="md md-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="large-4 medium-4 small-4 columns dropdown-product-item">
                            <div class="large-5 medium-5 small-5 columns dropdown-product-item--img">
                                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/archive-product.png" alt="">
                            </div>
                            <div class="large-7 medium-7 small-7 columns dropdown-product-item--desc">
                                <h3>Platinum</h3>
                                <p>Platinum is an ultra-premium lean gainer engineered</p>
                                <a href="#" class="more-on-this-product">Find out more <i class="md md-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="large-9 medium-9 small-9 columns content products-cont" id="header-tabs--2">
                        <h3>Same layout for first tab</h3>
                    </div>
                    <div class="large-9 medium-9 small-9 columns content products-cont" id="header-tabs--3">
                        <h3>Same layout for first tab</h3>
                    </div>
                    <div class="large-9 medium-9 small-9 columns content products-cont" id="header-tabs--4">
                        <h3>Same layout for first tab</h3>
                    </div>
                    <div class="large-9 medium-9 small-9 columns content products-cont" id="header-tabs--5">
                        <h3>Same layout for first tab</h3>
                    </div>
                    <div class="large-9 medium-9 small-9 columns content products-cont" id="header-tabs--6">
                        <h3>Same layout for first tab</h3>
                    </div>
                    <div class="large-9 medium-9 small-9 columns content products-cont" id="header-tabs--7">

                        <div class="brands-cont">
                            <div class="large-4 medium-4 small-4 columns">
                                <ul class="brand-list">
                                    <li><a href="#">BlenderBottle&trade;</a></li>
                                    <li><a href="#">BPI</a></li>
                                    <li><a href="#">FA Nutrition</a></li>
                                    <li><a href="#">Grenade</a></li>
                                </ul>
                            </div>
                            <div class="large-4 medium-4 small-4 columns">
                                <ul class="brand-list">
                                    <li><a href="#">BlenderBottle&trade;</a></li>
                                    <li><a href="#">BPI</a></li>
                                    <li><a href="#">FA Nutrition</a></li>
                                    <li><a href="#">Grenade</a></li>
                                </ul>
                            </div>
                            <div class="large-4 medium-4 small-4 columns">
                                <ul class="brand-list">
                                    <li><a href="#">BlenderBottle&trade;</a></li>
                                    <li><a href="#">BPI</a></li>
                                    <li><a href="#">FA Nutrition</a></li>
                                    <li><a href="#">Grenade</a></li>
                                </ul>
                            </div>
                            <div class="large-4 medium-4 small-4 columns">
                                <ul class="brand-list">
                                    <li><a href="#">BlenderBottle&trade;</a></li>
                                    <li><a href="#">BPI</a></li>
                                    <li><a href="#">FA Nutrition</a></li>
                                    <li><a href="#">Grenade</a></li>
                                </ul>
                            </div>
                            <div class="large-4 medium-4 small-4 columns">
                                <ul class="brand-list">
                                    <li><a href="#">BlenderBottle&trade;</a></li>
                                    <li><a href="#">BPI</a></li>
                                    <li><a href="#">FA Nutrition</a></li>
                                    <li><a href="#">Grenade</a></li>
                                </ul>
                            </div>
                            <div class="large-4 medium-4 small-4 columns">
                                <ul class="brand-list">
                                    <li><a href="#">BlenderBottle&trade;</a></li>
                                    <li><a href="#">BPI</a></li>
                                    <li><a href="#">FA Nutrition</a></li>
                                    <li><a href="#">Grenade</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if ($isHome) { ?>
        <div class="row">
            <div id="checkpoint-a" class="header-slider swiper-container">
                <div class="swiper-wrapper">
    <?php foreach ($this->params['homeSlider']->media as $oMedia) { ?>
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
<?php } ?>
</header>
