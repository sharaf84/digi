<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'TSS Home Page');
//var_dump($homeSlider->media);
?>
<div class="center-features row">
    <h3>largest egyptian fitness website</h3>
    <div class="large-4 medium-4 small-12 columns">
        <div class="star-icon"></div>
        <h4>High Quality</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
    <div class="large-4 medium-4 small-12 columns">
        <div class="delivery-icon"></div>
        <h4>Free Delivery</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
    <div class="large-4 medium-4 small-12 columns">
        <div class="network-icon"></div>
        <h4>Social Blog</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
</div>
<div class="home-tabs">
    <ul data-tab class="tabs">
        <li class="tab-title active"><a href="#featured-products"><?= Yii::t('app', 'Featured Products') ?></a></li>
        <li class="tab-title"><a href="#best-seller"><?= Yii::t('app', 'Best Seller') ?></a></li>
    </ul>
    <div class="tabs-content">
        <div id="featured-products" class="content row active">
            <?php foreach ($featuredProducts as $oProduct){?>
            <div class="large-4 medium-4 small-12 columns product-item">
                <img src="<?= $oProduct->getFeaturedImgUrl('home-product') ?>" alt="">
                <h4><?= $oProduct->title ?> - <span><?php echo $oProduct->category->name ?></span></h4>
                <p><?= $oProduct->brief ?></p>
                <a href="<?= $oProduct->getInnerUrl() ?>" class="shop-now"><i class="md md-shopping-cart"></i><?= Yii::t('app', 'Shop Now') ?></a>
            </div>
            <?php }?>
        </div>
        <div id="best-seller" class="content row">
            <?php foreach ($bestSellerProducts as $oProduct){?>
            <div class="large-4 medium-4 small-12 columns product-item">
                <img src="<?= $oProduct->getFeaturedImgUrl('home-product') ?>" alt="">
                <h4><?= $oProduct->title ?> - <span><?php echo $oProduct->category->name ?></span></h4>
                <p><?= $oProduct->brief ?></p>
                <a href="<?= $oProduct->getInnerUrl() ?>" class="shop-now"><i class="md md-shopping-cart"></i><?= Yii::t('app', 'Shop Now') ?></a>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<div class="dark-section">
    <div class="row">
        <div class="large-6 medium-6 small-12 columns hide-for-small"><img src="<?= Url::to('@frontThemeUrl') ?>/images/src/MergedLayers.png" alt=""></div>
        <div class="large-6 medium-6 small-12 columns">
            <h3>BLENDER BOTTLE</h3>
            <p>Daily Multivitamin for Overall Men's Health malum soccer das lansey fall left</p><a href="#" class="shop-now"><i class="md md-shopping-cart"></i> <?= Yii::t('app', 'Shop Now') ?></a>
        </div>
    </div>
</div>
<?php if (!empty($latestArticles)) { ?>
    <div class="article-section">
        <div class="row">
            <div class="large-3 medium-3 small-12 columns">
                <img src="<?= $latestArticles[0]->getFeaturedImgUrl('home-article') ?>" alt="">
            </div>
            <div class="large-9 medium-9 small-12 columns">
                <h4><?= $latestArticles[0]->title ?></h4>
                <p><?= $latestArticles[0]->brief ?></p>
                <a href="<?= $latestArticles[0]->getInnerUrl() ?>" class="shop-now"><?= Yii::t('app', 'Read More') ?></a>
            </div>
        </div>
    </div>
    <?php array_shift($latestArticles);
}
?>

<div class="home-bottom-articles row">
<?php foreach ($latestArticles as $oArticle) { ?>
    <div class="large-4 medium-4 small-12 columns">
        <img src="<?= $oArticle->getFeaturedImgUrl('bottom-article') ?>" alt="">
        <h5><?= $oArticle->title ?></h5>
        <p><?= $oArticle->brief ?></p>
        <p class="article-meta clearfix">
            <span class="date-time"><?= $oArticle->getSlideDate();?></span>
            <a href="<?= $oArticle->getInnerUrl() ?>" class="read-more"><?= Yii::t('app', 'Read More') ?></a>
        </p>
    </div>
<?php } ?>
</div>
