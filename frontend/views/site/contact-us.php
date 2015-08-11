<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Html::encode($oPage->title);
Yii::$app->metaTags->register($oPage);

?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<div id="checkpoint-a" class="single-page contact-us-page row">

    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= Html::encode($oPage->title) ?></h2>
    </div>

    <div class="row">
        <div class="large-6 medium-6 small-12 columns company-meta">
            <?= $oPage->body ?>
        </div>
        <div class="large-6 medium-6 small-12 columns">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <?= $form->field($oContactForm, 'name')->textInput(['placeholder' => Yii::t('app', 'Your Name')])->label(false) ?>
            <?= $form->field($oContactForm, 'email')->textInput(['placeholder' => Yii::t('app', 'Email Address')])->label(false) ?>
            <?= $form->field($oContactForm, 'subject')->textInput(['placeholder' => Yii::t('app', 'Subject')])->label(false) ?>
            <?= $form->field($oContactForm, 'body')->textArea(['rows' => 6, 'placeholder' => Yii::t('app', 'Message')])->label(false) ?>
            <?= Html::submitButton('Submit', ['class' => 'right', 'name' => 'contact-button']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2>Store Locator</h2>
        </div>
    </div>


</div>

<div class="contact-us-map-cont">
    <div id="contact-us-map"></div>
</div>

