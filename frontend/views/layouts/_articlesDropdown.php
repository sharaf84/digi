<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div id="articles-dropdown" class="drop-down">
    <div class="row">
        <div class="large-12 medium-12 small-12 columns articles-cont">
            <?php foreach (common\models\custom\Article::getLatest(5) as $oArticle) { ?>
                <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="<?= $oArticle->getInnerUrl() ?>">
                    <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                        <img src="<?= $oArticle->getFeaturedImgUrl('dropdown-article') ?>" alt="<?= Html::encode($oArticle->title) ?>">
                    </div>
                    <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                        <h3><?= Html::encode($oArticle->title) ?></h3>
                        <p><?= Html::encode($oArticle->brief) ?></p>
                    </div>
                </div>
            <?php } ?>

            <div class="large-2 medium-2 small-2 columns dropdown-product-item" data-route="<?= Url::to(['/articles']) ?>">
                <div class="large-12 medium-12 small-12 columns dropdown-product-item--img">
                    <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/addMore.png" alt="<?= Yii::t('app', 'More ...') ?>">
                </div>
                <div class="large-12 medium-12 small-12 columns dropdown-product-item--desc">
                    <h3><?= Yii::t('app', 'More ...') ?></h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>

