<?php

use yii\helpers\Url;
?>
<div class="large-3 medium-3 small-12 columns">
    <img src="<?= $model->getFeaturedImgUrl('list-product') ?>" alt="<?= $model->title ?>">
</div>
<div class="large-8 medium-8 small-12 columns">
    <h3> <a href="<?= $model->getInnerUrl() ?>"><?= $model->title ?></a></h3>
    <p><?= $model->description ?></p>
    <p class="price-tag"><?= $model->price ?> <?= CURRENCY_SYMBOL ?></p>
    <a href="<?= $model->getInnerUrl() ?>" class="more-on-this-product"><?= Yii::t('app', 'Find Out More') ?><i class="md md-keyboard-arrow-right"></i></a>
</div>
