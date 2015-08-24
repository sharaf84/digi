<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
            'id' => 'signupForm',
            //'action' => Url::to(['']),
            //'enableClientValidation' => true,
            //'validateOnSubmit' => true,
            'options' => ['class' => 'row'], //'data-abide' => true
        ]);
?>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oSignupForm, 'name'); ?>
        <!--<input type="text" required pattern="[a-zA-Z]+">-->
        <?= Html::activeTextInput($oSignupForm, 'name'); ?>
    </label>
    <?= Html::error($oSignupForm, 'name', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oSignupForm, 'email'); ?>
        <!--<input type="email" required>-->
        <?= Html::activeTextInput($oSignupForm, 'email'); ?>
    </label>
    <?= Html::error($oSignupForm, 'email', ['tag' => 'small', 'class' => 'error']); ?>
</div>


<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oSignupForm, 'password'); ?>
        <!--<input type="password" required>-->
        <?= Html::activePasswordInput($oSignupForm, 'password'); ?>
    </label>
    <?= Html::error($oSignupForm, 'password', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<!--    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label>Re-type Password
            <input type="password" required>
        </label>
        <small class="error">Password confirmation is required.</small>
    </div>-->

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oSignupForm, 'phone'); ?>
        <!--<input type="text" required pattern="number">-->
        <?= Html::activeTextInput($oSignupForm, 'phone'); ?>
    </label>
    <?= Html::error($oSignupForm, 'phone', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oSignupForm, 'city'); ?>
        <div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
<!--                <select id="price-filter" required>
                <option value="">Select your city</option>
                <option value="1">Cairo</option>
                <option value="2">Alex</option>
            </select>-->
            <?= Html::activeDropDownList($oSignupForm, 'city', common\models\custom\City::getList(), ['prompt' => Yii::t('app', 'Select Your City')]); ?>

        </div>
    </label>
    <?= Html::error($oSignupForm, 'city', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oSignupForm, 'address'); ?>
        <!--<input type="text" required>-->
        <?= Html::activeTextInput($oSignupForm, 'address'); ?>
    </label>
    <?= Html::error($oSignupForm, 'address', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="large-5 medium-5 small-12 columns large-centered medium-centered">
    <button type="submit"><?= Yii::t('app', 'Sign Up') ?></button>
</div>

<div class="large-5 medium-5 small-12 columns large-centered medium-centered text-center or-alternate-method">
    OR
</div>

<div class="large-5 medium-5 small-12 columns large-centered medium-centered">
    <div class="facebook-signup">
        <i class="fa fa-facebook"></i> <?= Yii::t('app', 'Sign in with Facebook') ?>
    </div>
</div>

<?php ActiveForm::end(); ?>