<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Html::encode($oProduct->title);
Yii::$app->metaTags->register($oProduct);
?>

<?php Pjax::begin(['id' => 'pjaxProduct']); ?>
<div id="checkpoint-a" class="single-page single-product" data-product-main-image="<?= $oChildProduct ? $oChildProduct->getImgUrlByIndex(0, 'main-product') : $oProduct->getFeaturedImgUrl('main-product') ?>">

    <div class="product-header row">
        <div class="large-4 medium-4 small-12 columns product-image">
            <img src="<?= $oChildProduct ? $oChildProduct->getImgUrlByIndex(0, 'main-product') : $oProduct->getFeaturedImgUrl('main-product') ?>" alt="<?= $oProduct->title ?>">
        </div>
        <div class="large-8 medium-8 small-12 columns">
            <h1><?= Html::encode($oProduct->title) ?></h1>
            <p><?= Html::encode($oProduct->description) ?></p>
            <p class="pricing"><?= $oChildProduct ? $oChildProduct->price : Yii::t('app', 'Lowest: ') . $oProduct->price ?> <?= Yii::t('app', CURRENCY_SYMBOL) ?></p>

            <?php
            echo $this->render('_productForm', [
                'oProduct' => $oProduct,
                'oChildProduct' => $oChildProduct,
                'oProductForm' => $oProductForm,
                'sizes' => $oProduct->getChildsSizes(),
                'flavors' => $flavors,
                'colors' => $colors,
                'colorsOptions' => $colorsOptions,
            ]);
            ?>

            <div class="row">
                <div class="large-8 medium-8 small-12 columns">
                    <!--<a href="#" class="shop-now" onclick="TSS.Form.ajaxSubmit('#productForm', '.single-product');"><i class="md md-shopping-cart"></i> Add To Cart</a>-->
                    <?php if ($oChildProduct && $oChildProduct->inStock()) { ?>
                        <?php if (common\models\custom\Cart::isItemInUserCartOrder($oChildProduct->id)) { ?>
                            <a href="<?= Url::to(['/cart']) ?>" class="shop-now at-cart"><i class="md md-shopping-cart"></i> <?= Yii::t('app', 'Already In Cart') ?></a>
                        <?php } else { ?>
                            <a href="<?= Url::to(['/cart/add', 'id' => $oChildProduct->id]) ?>" class="shop-now" data-method="post"><i class="md md-shopping-cart"></i> <?= Yii::t('app', 'Add To Cart') ?></a>
                        <?php } ?>
                    <?php } else { ?>
                        <span class="shop-now"><i class="md md-shopping-cart"></i> <?= Yii::t('app', 'Add To Cart') ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="productBox">
		<div class="productImage"><img src="<?= $oChildProduct ? $oChildProduct->getImgUrlByIndex(0, 'main-product') : $oProduct->getFeaturedImgUrl('main-product') ?>" alt="" /></div>
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
    </div>

    <?php if ($relatedProducts) { ?>
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Related Products') ?></h2>
        </div>

        <?= $this->render('_bottomProducts', ['products' => $relatedProducts]) ?>
    <?php } ?>

</div>
<?php Pjax::end(); ?>