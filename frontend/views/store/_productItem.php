<?php
use yii\helpers\Html;
?>
<div class="large-2 medium-3 small-12 columns align-center">
    <img src="<?= $model->getFeaturedImgUrl('list-product') ?>" alt="<?= Html::encode($model->title) ?>">
</div>
<div class="large-10 medium-9 small-12 columns">
    <h3> <a href="<?= $model->getInnerUrl() ?>"><?= Html::encode($model->title) ?></a></h3>
    <p><?= Html::encode($model->description) ?></p>
    <p class="price-tag"><?= $model->price ?> <?= Yii::t('app', CURRENCY_SYMBOL) ?></p>
    <a href="<?= $model->getInnerUrl() ?>" class="more-on-this-product"><?= Yii::t('app', 'Find Out More') ?><i class="md md-keyboard-arrow-right"></i></a>
</div>
