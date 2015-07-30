<?php
use yii\helpers\Html;
?>
<div class="row">
    <?php foreach ($products as $oProduct) { ?>
        <div class="large-3 medium-3 small-12 columns product-item">
            <img src="<?= $oProduct->getFeaturedImgUrl('bottom-product') ?>" alt="<?= Html::encode($oProduct->title) ?>">
            <h4><?= Html::encode($oProduct->title) ?> - <span><?= Html::encode($oProduct->category->name) ?></span></h4>
            <p><?= Html::encode($oProduct->brief) ?></p>
            <a href="<?= $oProduct->getInnerUrl() ?>" class="more-on-this-product"><?= Yii::t('app', 'Find Out More') ?><i class="md md-keyboard-arrow-right"></i></a>
        </div>
    <?php } ?>
</div>