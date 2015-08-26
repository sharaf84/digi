<?php

use frontend\widgets\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
            'id' => 'signupForm',
            'options' => ['class' => 'row'],
        ]);
?>

<?= $form->field($oSignupForm, 'name')->textInput() ?>
<?= $form->field($oSignupForm, 'email')->textInput() ?>
<?= $form->field($oSignupForm, 'password')->passwordInput() ?>
<?= $form->field($oSignupForm, 'phone')->textInput() ?>
<?= $form->field($oSignupForm, 'city')->dropDownList(common\models\custom\City::getList(), ['prompt' => Yii::t('app', 'Select Your City')]) ?>
<?= $form->field($oSignupForm, 'address')->textInput() ?>

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