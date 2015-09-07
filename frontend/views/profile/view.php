<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $oProfile->getName();
?>

<div id="checkpoint-a" class="single-page profile-page row">

    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= Yii::t('app', 'Member Profile') ?></h2>
    </div>
    <div class="large-12 medium-12 small-12 columns">
        <div class="row">
            <div class="large-3 medium-3 small-12 columns profile-avatar">
                
                <img src="<?= Yii::$app->user->identity->getFeaturedImgUrl('profile_avatar') ?>" alt="<?= Yii::$app->user->identity->getName() ?>" class="avatarImg">
                <?php
                // A block file picker button with custom icon and label
                echo \kartik\widgets\FileInput::widget([
                    'id' => 'profileAvatarInput',
                    'name' => 'avatar',
                    'pluginOptions' => [
                        'uploadUrl' => Url::to(['/profile/upload-avatar']),
                        'showCaption' => false,
                        'showRemove' => false,
                        'showCancel' => false,
                        'showUpload' => false,
                        //'browseClass' => 'btn btn-primary btn-block',
                        //'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseIcon' => '<i class="fa fa-camera"></i> ',
                        'browseLabel' => Yii::t('app', 'Select Photo'),
                    ],
                    'pluginEvents' => [
                        'filebatchselected' => "function(event, files){ $('.profile-avatar .file-preview').css('visibility', 'visible'); }",
                        'fileclear' => "function(event, files){ $('.profile-avatar .file-preview').css('visibility', 'hidden'); }",
                        'fileuploaded' => "function(event, data, previewId, index){var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader; $('.avatarImg').attr('src', response.imgUrl); $('.fileinput-remove').trigger('click'); }",
                    ],
                    'options' => ['accept' => 'image/*'],
                ]);
                ?>
                

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
</div>
