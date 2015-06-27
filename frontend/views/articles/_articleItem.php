<?php if ($index == 0) { ?>
    <!-- Main Article -->
        <div class="article-image large-12 medium-12 small-12 columns">
            <img src="<?= $model->getFeaturedImgUrl('main-article') ?>" alt="<?= $model->title ?>">
        </div>

        <h3 class="large-12 medium-12 small-12 columns"><?= $model->title ?></h3>
        <p class="large-12 medium-12 small-12 columns"><?= $model->description ?></p>

        <p class="article-meta large-10 medium-10 small-12 columns">
            <?= $model->getListDate() ?> - 10 comments
        </p>
        <a href="<?= $model->getInnerUrl() ?>" class="shop-now large-2 medium-2 small-12 columns"><?= Yii::t('app', 'Read more') ?></a>
    <!-- [/] Main Article -->
<?php } else { ?>
    <!-- Single Article -->
        <div class="article-image large-2 medium-2 small-12 columns">
            <img src="<?= $model->getFeaturedImgUrl('list-article') ?>" alt="<?= $model->title ?>">
        </div>
        <div class="large-10 medium-10 small-12 columns">
            <h3><?= $model->title ?></h3>
            <p><?= $model->description ?></p>
        </div>
        <p class="article-meta large-8 medium-8 small-12 columns">
            <?= $model->getListDate() ?> - 10 comments
        </p>
        <a href="<?= $model->getInnerUrl() ?>" class="shop-now large-2 medium-2 small-12 columns"><?= Yii::t('app', 'Read more') ?></a>
    <!-- [/] Single Article -->
    <?php
}?>