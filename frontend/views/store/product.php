<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Html::encode($oProduct->title);
Yii::$app->metaTags->register($oProduct);
?>

<?php Pjax::begin(); ?>
<div id="checkpoint-a" class="single-page single-product row" data-product-main-image="<?= $oChildProduct ? $oChildProduct->getImgUrlByIndex(0, 'main-product') : $oProduct->getFeaturedImgUrl('main-product') ?>">

    <div class="product-header row">
        <div class="large-4 medium-4 small-12 columns product-image">
            <img src="<?= $oChildProduct ? $oChildProduct->getImgUrlByIndex(0, 'main-product') : $oProduct->getFeaturedImgUrl('main-product') ?>" alt="<?= $oProduct->title ?>">
        </div>
        <div class="large-8 medium-8 small-12 columns">
            <h1><?= Html::encode($oProduct->title) ?></h1>
            <p><?= Html::encode($oProduct->description) ?></p>
            <p class="pricing"><?= $oChildProduct ? $oChildProduct->price : Yii::t('app', 'Lowest: ') . $oProduct->price ?> <?= CURRENCY_SYMBOL ?></p>

            <?php
            echo $this->render('_productForm', [
                'oProduct' => $oProduct,
                'oChildProduct' => $oChildProduct,
                'oProductForm' => $oProductForm,
                'sizes' => $oProduct->getChildsSizes(),
                'flavors' => $flavors,
                'colors' => $colors,
            ]);
            ?>

            <div class="row">
                <div class="large-8 medium-8 small-12 columns">
                    <?php if ($oChildProduct) { ?>
                        <a href="#" class="shop-now" onclick="TSS.Form.ajaxSubmit('#productForm', '.single-product');"><i class="md md-shopping-cart"></i> Add To Cart</a>
                    <?php } else { ?>
                        <span class="shop-now"><i class="md md-shopping-cart"></i> Add To Cart</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="product-tabs">
            <?php if ($oChildProduct && !$oProduct->isAccessory()) { ?>
                <ul data-tab class="tabs">
                    <li class="tab-title active"><a href="#product-info">Product Info</a></li>
                    <li class="tab-title"><a href="#nutrition-facts">Nutrition Facts</a></li>
                </ul>
            <?php } ?>
            <div class="tabs-content">
                <div id="product-info" class="content row active">
                    <?= $oProduct->body ?>
                </div>
                <?php if ($oChildProduct && !$oProduct->isAccessory()) { ?>
                    <div id="nutrition-facts" class="content row">
                        <img src="<?= $oChildProduct->getImgUrlByIndex(1) ?>" >
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php if ($relatedProducts) { ?>
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Related Products') ?></h2>
        </div>

        <?= $this->render('_bottomProducts', ['products' => $relatedProducts]) ?>
    <?php } ?>
    
</div>
<?php Pjax::end(); ?>