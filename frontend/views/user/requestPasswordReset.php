<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Request password reset');
?>

<div class="single-page password-reset-page">

    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Request password reset') ?></h2>
        </div>
    </div>

    <div class="row">
        <p><?= Yii::t('app', 'Please fill out your email. A link to reset password will be sent there.') ?></p>
    </div>

    <?php ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
    
    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($oRequestPasswordResetForm, 'email'); ?>
            <?= Html::activeTextInput($oRequestPasswordResetForm, 'email'); ?>
        </label>
        <?= Html::error($oRequestPasswordResetForm, 'email', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="large-5 medium-5 small-12 columns large-centered medium-centered">
        <button type="submit"><?= Yii::t('app', 'Send') ?></button>
    </div>

    <?php ActiveForm::end(); ?>
</div>