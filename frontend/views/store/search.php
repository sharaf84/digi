<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\Inflector;


$this->title = Yii::t('app', 'Store');
?>
<div id="checkpoint-a" class="single-page archive-page row">
    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= $category ? Inflector::camel2words($category) : Yii::t('app', 'Search results of: {key}', ['key' => $oSearchForm->key]) ?></h2>
    </div>
    <?php Pjax::begin(); ?>
    
    <?php echo $this->render('_searchForm', ['oSearchForm' => $oSearchForm, 'category' => $category, ]);?>
    
    <div class="products-list">
        <?=
        \yii\widgets\ListView::widget([
            'dataProvider' => $oProductsDP,
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
        <h2><?= Yii::t('app', 'Best Seller') ?></h2>
    </div>
    
    <?= $this->render('_bottomProducts', ['products' => $bestSellerProducts]) ?>
    
</div>
