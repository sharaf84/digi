<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
$this->title = 'Products List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="checkpoint-a" class="single-page archive-page row">
    <div class="page-title large-12 medium-12 small-12 columns">
        <h2>Muscle Building</h2>
    </div>
    <form action="/store" class="row">
        <div class="large-10 medium-10 small-12 columns">
            <div class="alphabet-filter">
                <input type="hidden" id="filterCharValue" value="">
                <ul class="pagination filters">
                    <li data-id="" class="current"><a href="#">All</a></li>
                    <li data-id="a"><a href="#">a</a></li>
                    <li data-id="b"><a href="#">b</a></li>
                    <li data-id="c"><a href="#">c</a></li>
                    <li data-id="d"><a href="#">d</a></li>
                    <li data-id="e"><a href="#">e</a></li>
                    <li data-id="f"><a href="#">f</a></li>
                    <li data-id="g"><a href="#">g</a></li>
                    <li data-id="h"><a href="#">h</a></li>
                    <li data-id="i"><a href="#">i</a></li>
                    <li data-id="j"><a href="#">j</a></li>
                    <li data-id="k"><a href="#">k</a></li>
                    <li data-id="l"><a href="#">l</a></li>
                    <li data-id="m"><a href="#">m</a></li>
                    <li data-id="n"><a href="#">n</a></li>
                    <li data-id="o"><a href="#">o</a></li>
                    <li data-id="p"><a href="#">p</a></li>
                    <li data-id="q"><a href="#">q</a></li>
                    <li data-id="r"><a href="#">r</a></li>
                    <li data-id="s"><a href="#">s</a></li>
                    <li data-id="t"><a href="#">t</a></li>
                    <li data-id="u"><a href="#">u</a></li>
                    <li data-id="v"><a href="#">v</a></li>
                    <li data-id="w"><a href="#">w</a></li>
                    <li data-id="x"><a href="#">x</a></li>
                    <li data-id="y"><a href="#">y</a></li>
                    <li data-id="z"><a href="#">z</a></li>
                    <li data-id="..."><a href="#">...</a></li>
                </ul>
            </div>
        </div>
        <div class="large-2 medium-2 small-12 columns">
            <div class="price-filter">
                <div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
                    <select id="price-filter" name="price">
                        <option value="0">Sort By Price</option>
                        <option value="1">Price: Higher First</option>
                        <option value="2">Price: Lower First</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <div class="products-list">
        <?php Pjax::begin(); ?>
        <?=
        \yii\widgets\ListView::widget([
            'dataProvider' => $oProductDataProvider,
            'itemOptions' => ['class' => 'single-product-item row'],
            'itemView' => '_productItem',
            'layout' => "{sorter}\n{items}\n{pager}",
            //'summary' => false,
            'sorter'=>[
                'attributes'=>['price']
            ],
            'pager' => [
                'options' => ['class' => 'pagination normalize'],
                'activePageCssClass' => 'current',
                'prevPageLabel' => '<i class="md md-chevron-left"></i>' . Yii::t('app', 'Back'),
                'nextPageLabel' => Yii::t('app', 'Next') . '<i class="md md-chevron-right"></i>',
            ]
        ])
        ?>
        <?php Pjax::end(); ?>
    </div>
    <div class="page-title large-12 medium-12 small-12 columns">
        <h2>Best Seller</h2>
    </div>
    <div class="row">
        <?php foreach ($bestSellerProducts as $oProduct) { ?>
            <div class="large-3 medium-3 small-12 columns product-item">
                <img src="<?= $oProduct->getFeaturedImgUrl('bottom-product') ?>" alt="">
                <h4><?= $oProduct->title ?> - <span><?php echo $oProduct->category->name ?></span></h4>
                <p><?= $oProduct->brief ?></p>
                <a href="<?= $oProduct->getInnerUrl() ?>" class="more-on-this-product"><?= Yii::t('app', 'Find Out More') ?><i class="md md-keyboard-arrow-right"></i></a>
            </div>
        <?php } ?>
    </div>
</div>
