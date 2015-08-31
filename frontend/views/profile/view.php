<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $oProfile->getName();
?>

<div id="checkpoint-a" class="single-page profile-page row">

    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= Yii::t('app', 'Member Profile') ?></h2>
    </div>

    <div class="row">
        <div class="large-3 medium-3 small-12 columns">
            <img src="<?= Yii::$app->user->identity->getFeaturedImgUrl('profile_avatar') ?>" alt="<?= Yii::$app->user->identity->getName() ?>">
        </div>
        <div class="large-9 medium-9 small-12 columns user-info">

            <a data-tooltip aria-haspopup="true" href="<?= Url::to(['/profile/edit']) ?>" title="<?= Yii::t('app', 'Edit Your Profile') ?>" class="edit-profile"> <i class="md md-edit"></i> </a>

            <h3><?= $oProfile->getName() ?></h3>
            <p>
                <strong><?= Yii::t('app', 'Mobile') ?>:</strong> <?= Html::encode($oProfile->phone) ?> <br />
                <strong><?= Yii::t('app', 'Address') ?>:</strong> <?= Html::encode($oProfile->getFullAddress()) ?> <br />
                <strong><?= Yii::t('app', 'Email') ?>:</strong> <?= Html::encode(Yii::$app->user->identity->email) ?> <br />
            </p>
        </div>
    </div>

    <div class="row">
        <div class="profile-section">
            <div class="section-header">
                <h3><span><?= Yii::t('app', 'Biography') ?></span></h3>
            </div>
            <div class="section-body">
                <p><?= Html::encode($oProfile->bio) ?></p>
            </div>
        </div>
    </div>
    
    <?= $this->render('_activities', ['activities' => $activities]) ?>
    
    <?= $this->render('_activeOrders', ['activeOrders' => $activeOrders]) ?>
    
</div>
