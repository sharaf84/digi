<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Articles');
?>

<div id="checkpoint-a" class="single-page blog-listing row">

    <div class="page-title large-12 medium-12 small-12 columns">
        <h2>Articles</h2>
    </div>
    <?php Pjax::begin(); ?>
    <?=
        \yii\widgets\ListView::widget([
            'dataProvider' => $oArticlesDP,
            'itemOptions' => ['tag' => 'article', 'class' => 'row article-list-item'],//@ first should be main-article
            'itemView' => '_articleItem',
            'layout' => "{items}\n{pager}",
            'pager' => [
                'options' => ['class' => 'pagination normalize'],
                'activePageCssClass' => 'current',
                'prevPageLabel' => '<i class="md md-chevron-left"></i>' . Yii::t('app', 'Back'),
                'nextPageLabel' => Yii::t('app', 'Next') . '<i class="md md-chevron-right"></i>',
            ]
        ])
        ?>
    <?php Pjax::end(); ?>

    <div class="page-title large-12 medium-12 small-12 columns">
        <h2>MOST READ</h2>
    </div>


    <div class="home-bottom-articles row">
        <div class="large-4 medium-4 small-12 columns"><img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
            <h5>WORKOUT LESSONS</h5>
            <p>seeing results is from high rep training (12-15) combined with supersets is from high rep training.</p>
            <p class="article-meta"><span class="date-time">APRIL 22, 2015</span><a href="#" class="read-more">Read More</a></p>
        </div>
        <div class="large-4 medium-4 small-12 columns"><img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
            <h5>WORKOUT LESSONS</h5>
            <p>seeing results is from high rep training (12-15) combined with supersets is from high rep training.</p>
            <p class="article-meta"><span class="date-time">APRIL 22, 2015</span><a href="#" class="read-more">Read More</a></p>
        </div>
        <div class="large-4 medium-4 small-12 columns"><img src="<?= Url::to('@frontThemeUrl') ?>/images/src/Layer-768.png" alt="">
            <h5>WORKOUT LESSONS</h5>
            <p>seeing results is from high rep training (12-15) combined with supersets is from high rep training.</p>
            <p class="article-meta"><span class="date-time">APRIL 22, 2015</span><a href="#" class="read-more">Read More</a></p>
        </div>
    </div>


</div>
