<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Edit Profile');
?>

<div class="single-page register-page">
    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Edit Profile')?></h2>
        </div>
    </div>

    <?php
    $form = ActiveForm::begin([
                'id' => 'editProfileForm',
                //'action' => Url::to(['']),
                //'enableAjaxValidation' => true,
                //'enableClientValidation' => true,
                //'validateOnSubmit' => true,
                'options' => ['class' => 'row', 'data-abide' => true],
    ]);
    ?>

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($oProfile, 'first_name'); ?>
            <!--<input type="text" required pattern="[a-zA-Z]+">-->
            <?= Html::activeTextInput($oProfile, 'first_name'); ?>
        </label>
        <?= Html::error($oProfile, 'first_name', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($oProfile, 'phone'); ?>
            <?= Html::activeTextInput($oProfile, 'phone'); ?>
        </label>
        <?= Html::error($oProfile, 'phone', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($oProfile, 'city_id'); ?>
            <div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
                <?= Html::activeDropDownList($oProfile, 'city_id', common\models\custom\City::getList(), ['prompt' => Yii::t('app', 'Select Your City')]); ?>
            </div>
        </label>
        <?= Html::error($oProfile, 'city_id', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($oProfile, 'address'); ?>
            <?= Html::activeTextInput($oProfile, 'address'); ?>
        </label>
        <?= Html::error($oProfile, 'address', ['tag' => 'small', 'class' => 'error']); ?>
    </div>
    
    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($oProfile, 'bio'); ?>
            <?= Html::activeTextInput($oProfile, 'bio'); ?>
        </label>
        <?= Html::error($oProfile, 'bio', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="large-5 medium-5 small-12 columns large-centered medium-centered">
        <button type="submit"><?= Yii::t('app', 'Save')?></button>
    </div>

    <?php ActiveForm::end(); ?>
</div>