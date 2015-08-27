<?php
use yii\helpers\Html;
?>

<?php if ($index == 0) { ?>
    <!-- Main Article -->
        <div class="article-image large-12 medium-12 small-12 columns">
            <img src="<?= $model->getFeaturedImgUrl('main-article') ?>" alt="<?= Html::encode($model->title) ?>">
        </div>

        <h3 class="large-12 medium-12 small-12 columns"><?= Html::encode($model->title) ?></h3>
        <p class="large-12 medium-12 small-12 columns"><?= Html::encode($model->description) ?></p>

        <p class="article-meta large-10 medium-10 small-12 columns">
            <?= $model->getListDate() ?> - <?= $model->getCommentsCount() ?> <?= Yii::t('app', 'Comment(s)') ?>
        </p>
        <a href="<?= $model->getInnerUrl() ?>" class="shop-now large-2 medium-2 small-12 columns"><?= Yii::t('app', 'Read more') ?></a>
    <!-- [/] Main Article -->
<?php } else { ?>
    <!-- Single Article -->
        <div class="article-image large-2 medium-2 small-12 columns">
            <img src="<?= $model->getFeaturedImgUrl('list-article') ?>" alt="<?= Html::encode($model->title) ?>">
        </div>
        <div class="large-10 medium-10 small-12 columns">
            <h3><?= Html::encode($model->title) ?></h3>
            <p><?= Html::encode($model->description) ?></p>
        </div>
        <p class="article-meta large-8 medium-8 small-12 columns">
            <?= $model->getListDate() ?> - <?= $model->getCommentsCount() ?> <?= Yii::t('app', 'Comment(s)') ?>
        </p>
        <a href="<?= $model->getInnerUrl() ?>" class="shop-now large-2 medium-2 small-12 columns"><?= Yii::t('app', 'Read more') ?></a>
    <!-- [/] Single Article -->
    <?php
}?>