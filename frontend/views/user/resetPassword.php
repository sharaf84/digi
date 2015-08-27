<?php

use frontend\widgets\ActiveForm;

$this->title = Yii::t('app', 'Reset password');
?>

<div class="single-page reset-password-page">

    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Reset password') ?></h2>
        </div>
    </div>

    <div class="row">
        <p><?= Yii::t('app', 'Please choose your new password:') ?></p>
    </div>

    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
    
    <?= $form->field($oResetPasswordForm, 'password')->passwordInput() ?>
    
    <div class="large-5 medium-5 small-12 columns large-centered medium-centered">
        <button type="submit"><?= Yii::t('app', 'Save') ?></button>
    </div>

    <?php ActiveForm::end(); ?>
</div>