<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Html::encode($oArticle->title);
Yii::$app->metaTags->register($oArticle);
?>
<div id="checkpoint-a" class="single-page blog-listing single-blog row">
    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= Yii::t('app', 'Articles') ?></h2>
    </div>


    <article class="row main-article">
        <div class="article-image large-12 medium-12 small-12 columns">
            <img src="<?= $oArticle->getFeaturedImgUrl('main-article') ?>" alt="<?= Html::encode($oArticle->title) ?>">
        </div>

        <h3 class="large-12 medium-12 small-12 columns"><?= Html::encode($oArticle->title) ?></h3>

        <div class="large-12 medium-12 small-12 columns">
            <?= $oArticle->body ?>
        </div>

    </article>
    
    <?php echo \frontend\widgets\comments\Comment::widget(['model' => $oArticle]); ?>

</div>
