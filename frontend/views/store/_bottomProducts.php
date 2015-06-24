<div class="page-title large-12 medium-12 small-12 columns">
    <h2><?= $title ?></h2>
</div>
<div class="row">
    <?php foreach ($products as $oProduct) { ?>
        <div class="large-3 medium-3 small-12 columns product-item">
            <img src="<?= $oProduct->getFeaturedImgUrl('bottom-product') ?>" alt="">
            <h4><?= $oProduct->title ?> - <span><?= $oProduct->category->name ?></span></h4>
            <p><?= $oProduct->brief ?></p>
            <a href="<?= $oProduct->getInnerUrl() ?>" class="more-on-this-product"><?= Yii::t('app', 'Find Out More') ?><i class="md md-keyboard-arrow-right"></i></a>
        </div>
    <?php } ?>
</div>