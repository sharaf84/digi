<div class="home-bottom-articles row">
<?php foreach ($articles as $oArticle) { ?>
    <div class="large-4 medium-4 small-12 columns">
        <img src="<?= $oArticle->getFeaturedImgUrl('bottom-article') ?>" alt="">
        <h5><?= $oArticle->title ?></h5>
        <p><?= $oArticle->brief ?></p>
        <p class="article-meta">
            <span class="date-time"><?= $oArticle->getSlideDate();?></span>
            <a href="<?= $oArticle->getInnerUrl() ?>" class="read-more"><?= Yii::t('app', 'Read More') ?></a>
        </p>
    </div>
<?php } ?>
</div>