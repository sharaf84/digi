<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\Inflector;

$this->title = 'Products List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="checkpoint-a" class="single-page archive-page row">
    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= $category ? Inflector::camel2words($category) : Yii::t('app', 'Search results of: {key}', ['key' => $oSearchForm->key]) ?></h2>
    </div>
    <?php Pjax::begin(); ?>
    
    <?php 
    $params = \Yii::$app->getRequest()->getQueryParams();
    $params['SearchForm']['alpha'] = 'p' ;
    $params[0] = \Yii::$app->controller->getRoute();
    $url = \Yii::$app->getUrlManager()->createUrl($params);
    ?>
    <a href="<?php echo $url ?>">p</a>
    <div class="large-10 medium-10 small-12 columns">
        <div class="alphabet-filter">
            <input type="hidden" id="filterCharValue" value="">
            <ul class="pagination filters">
                <li data-id="" class="current"><a href="<?= Url::current() ?>">All</a></li>
                <li data-id="a"><a href="<?= Url::to([Url::current(), 'SearchForm[alpha]' => 'a']) ?>">a</a></li>
                <li data-id="b"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'b']) ?>">b</a></li>
                <li data-id="c"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'c']) ?>">c</a></li>
                <li data-id="d"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'd']) ?>">d</a></li>
                <li data-id="e"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'e']) ?>">e</a></li>
                <li data-id="f"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'f']) ?>">f</a></li>
                <li data-id="g"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'g']) ?>">g</a></li>
                <li data-id="h"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'h']) ?>">h</a></li>
                <li data-id="i"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'i']) ?>">i</a></li>
                <li data-id="j"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'j']) ?>">j</a></li>
                <li data-id="k"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'k']) ?>">k</a></li>
                <li data-id="l"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'l']) ?>">l</a></li>
                <li data-id="m"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'm']) ?>">m</a></li>
                <li data-id="n"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'n']) ?>">n</a></li>
                <li data-id="o"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'o']) ?>">o</a></li>
                <li data-id="p"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'p']) ?>">p</a></li>
                <li data-id="q"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'q']) ?>">q</a></li>
                <li data-id="r"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'r']) ?>">r</a></li>
                <li data-id="s"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 's']) ?>">s</a></li>
                <li data-id="t"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 't']) ?>">t</a></li>
                <li data-id="u"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'u']) ?>">u</a></li>
                <li data-id="v"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'v']) ?>">v</a></li>
                <li data-id="w"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'w']) ?>">w</a></li>
                <li data-id="x"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'x']) ?>">x</a></li>
                <li data-id="y"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'y']) ?>">y</a></li>
                <li data-id="z"><a href="<?= Url::to(['/store/search', 'SearchForm[alpha]' => 'z']) ?>">z</a></li>
                <li data-id="..."><a href="#">...</a></li>
            </ul>
        </div>
    </div>
    <div class="large-2 medium-2 small-12 columns">
        <?= yii\widgets\LinkSorter::widget([
            'sort' => new yii\data\Sort(['attributes' => ['price']]),
        ])
        ?>
        <div class="price-filter">
            <div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
                <select id="price-filter" name="sort">
                    <option value="0">Sort By Price</option>
                    <option value="1">Price: Higher First</option>
                    <option value="2">Price: Lower First</option>
                </select>
            </div>
        </div>
    </div>
    <div class="products-list">
        <?=
        \yii\widgets\ListView::widget([
            'dataProvider' => $oProductDataProvider,
            'itemOptions' => ['class' => 'single-product-item row'],
            'itemView' => '_productItem',
            'layout' => "{items}\n{pager}",
            //'summary' => false,
            'sorter' => [
                'attributes' => ['price']
            ],
            'pager' => [
                'options' => ['class' => 'pagination normalize'],
                'activePageCssClass' => 'current',
                'prevPageLabel' => '<i class="md md-chevron-left"></i>' . Yii::t('app', 'Back'),
                'nextPageLabel' => Yii::t('app', 'Next') . '<i class="md md-chevron-right"></i>',
            ]
        ])
        ?>
    </div>
<?php Pjax::end(); ?>
    <div class="page-title large-12 medium-12 small-12 columns">
        <h2>Best Seller</h2>
    </div>
    <div class="row">
<?php foreach ($bestSellerProducts as $oProduct) { ?>
            <div class="large-3 medium-3 small-12 columns product-item">
                <img src="<?= $oProduct->getFeaturedImgUrl('bottom-product') ?>" alt="">
                <h4><?= $oProduct->title ?> - <span><?= $oProduct->category->name ?></span></h4>
                <p><?= $oProduct->brief ?></p>
                <a href="<?= $oProduct->getInnerUrl() ?>" class="more-on-this-product"><?= Yii::t('app', 'Find Out More') ?><i class="md md-keyboard-arrow-right"></i></a>
            </div>
<?php } ?>
    </div>
</div>
