<?php

use yii\helpers\Html;
?>

<div id="store-dropdown" class="drop-down">
    <div class="row">
        <div class="large-3 medium-3 small-3 columns tabs-cont">
            <ul data-tab>
                <?php
                !isset($headerCategories) and $headerCategories = common\models\custom\Category::getHeaderDropdown();
                foreach ($headerCategories as $oCategory) {
                    ?>
                    <li>
                        <a data-category-uri="<?= $oCategory->getInnerUrl() ?>" href="#header-tabs--<?= $oCategory->slug ?>" class="active"><?= Html::encode($oCategory->name) ?></a>
                    </li>  
                <?php } ?>
                <li><a data-category-uri="#" href="#header-tabs--brands"><?= Yii::t('app', 'Brands') ?></a></li>
            </ul>
        </div>
        <?php
        $index = 0;
        foreach ($headerCategories as $oCategory) {
            ?>
            <div class="large-9 medium-9 small-9 columns content <?= ++$index == 1 ? 'active' : ''; ?> products-cont" id="header-tabs--<?= $oCategory->slug ?>">
                <?php foreach ($oCategory->getLatestProducts(6) as $oProduct) { ?>
                    <div class="large-4 medium-4 small-4 columns dropdown-product-item">
                        <div class="large-5 medium-5 small-5 columns dropdown-product-item--img">
                            <img src="<?= $oProduct->getFeaturedImgUrl('dropdown-product') ?>" alt="">                                    
                        </div>
                        <div class="large-7 medium-7 small-7 columns dropdown-product-item--desc">
                            <h3><?= Html::encode($oProduct->title) ?></h3>
                            <p><?= Html::encode($oProduct->brief) ?></p>
                            <a href="<?= $oProduct->getInnerUrl() ?>" class="more-on-this-product"><?= Yii::t('app', 'Find out more') ?> <i class="md md-chevron-right"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="large-9 medium-9 small-9 columns content products-cont" id="header-tabs--brands">
            <div class="brands-cont">
                <div class="large-4 medium-4 small-4 columns">
                    <ul class="brand-list">
                        <?php
                        $index = 0;
                        !isset($headerBrands) and $headerBrands = common\models\custom\Brand::getHeaderDropdown();
                        foreach ($headerBrands as $oBrand) {
                            ?>
                            <li><a href="<?= $oBrand->getInnerUrl() ?>"><?= Html::encode($oBrand->name) ?></a></li>
                            <?php if (++$index % 4 == 0) { ?>
                            </ul></div><div class="large-4 medium-4 small-4 columns"><ul class="brand-list">
                        <?php } ?>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

