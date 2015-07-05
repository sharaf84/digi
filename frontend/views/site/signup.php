<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Signup';
?>

<div class="single-page register-page">
    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2>Sign Up</h2>
        </div>
    </div>

    <?php
    $form = ActiveForm::begin([
                'id' => 'signupForm',
                //'action' => Url::to(['']),
                //'enableClientValidation' => true,
                //'validateOnSubmit' => true,
                'options' => ['class' => 'row', 'data-abide' => true],
    ]);
    ?>

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($model, 'name'); ?>
            <!--<input type="text" required pattern="[a-zA-Z]+">-->
            <?= Html::activeTextInput($model, 'name'); ?>
        </label>
        <?= Html::error($model, 'name', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($model, 'email'); ?>
            <!--<input type="email" required>-->
            <?= Html::activeTextInput($model, 'email'); ?>
        </label>
        <?= Html::error($model, 'email', ['tag' => 'small', 'class' => 'error']); ?>
    </div>


    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($model, 'password'); ?>
            <!--<input type="password" required>-->
            <?= Html::activePasswordInput($model, 'password'); ?>
        </label>
        <?= Html::error($model, 'password', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <!--    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
            <label>Re-type Password
                <input type="password" required>
            </label>
            <small class="error">Password confirmation is required.</small>
        </div>-->

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($model, 'phone'); ?>
            <!--<input type="text" required pattern="number">-->
            <?= Html::activeTextInput($model, 'phone'); ?>
        </label>
        <?= Html::error($model, 'phone', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($model, 'city'); ?>
            <div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
<!--                <select id="price-filter" required>
                    <option value="">Select your city</option>
                    <option value="1">Cairo</option>
                    <option value="2">Alex</option>
                </select>-->
                <?= Html::activeDropDownList($model, 'city', ['Select Your City', 'Cairo', 'Alex']); ?>
            </div>
        </label>
        <?= Html::error($model, 'city', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
        <label><?= Html::activeLabel($model, 'address'); ?>
            <!--<input type="text" required>-->
            <?= Html::activeTextInput($model, 'address'); ?>
        </label>
        <?= Html::error($model, 'address', ['tag' => 'small', 'class' => 'error']); ?>
    </div>

    <div class="large-5 medium-5 small-12 columns large-centered medium-centered">
        <button type="submit">Register</button>
    </div>

    <div class="large-5 medium-5 small-12 columns large-centered medium-centered text-center or-alternate-method">
        OR
    </div>

    <div class="large-5 medium-5 small-12 columns large-centered medium-centered">
        <div class="facebook-signup">
            <i class="fa fa-facebook"></i> Sign in with Facebook
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>