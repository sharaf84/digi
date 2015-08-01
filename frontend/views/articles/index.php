<?php

use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Articles');
?>

<div id="checkpoint-a" class="single-page blog-listing row">

    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= Yii::t('app', 'Articles') ?></h2>
    </div>
    <?php Pjax::begin(); ?>
    <?=
    \yii\widgets\ListView::widget([
        'dataProvider' => $oArticlesDP,
        'itemOptions' => ['tag' => 'article', 'class' => 'row article-list-item'], //@ first should be main-article
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
        <h2><?= Yii::t('app', 'MOST READ') ?></h2>
    </div>

    <?= $this->render('_bottomArticles', ['articles' => $mostReadArticles]) ?>

</div>
