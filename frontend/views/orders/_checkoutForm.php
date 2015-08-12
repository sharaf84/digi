<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
            'id' => 'checkoutForm',
            'options' => ['class' => 'row'],
        ]);
?>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oCheckoutOrder, 'name'); ?>
        <?= Html::activeTextInput($oCheckoutOrder, 'name'); ?>
    </label>
    <?= Html::error($oCheckoutOrder, 'name', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oCheckoutOrder, 'email'); ?>
        <?= Html::activeTextInput($oCheckoutOrder, 'email'); ?>
    </label>
    <?= Html::error($oCheckoutOrder, 'email', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oCheckoutOrder, 'phone'); ?>
        <?= Html::activeTextInput($oCheckoutOrder, 'phone'); ?>
    </label>
    <?= Html::error($oCheckoutOrder, 'phone', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oCheckoutOrder, 'address'); ?>
        <?= Html::activeTextInput($oCheckoutOrder, 'address'); ?>
    </label>
    <?= Html::error($oCheckoutOrder, 'address', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oCheckoutOrder, 'comment'); ?>
        <?= Html::activeTextInput($oCheckoutOrder, 'comment'); ?>
    </label>
    <?= Html::error($oCheckoutOrder, 'comment', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="input-cont large-5 medium-5 small-12 columns large-centered medium-centered">
    <label><?= Html::activeLabel($oCheckoutOrder, 'payment_method'); ?>
        <div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
            <?= Html::activeDropDownList($oCheckoutOrder, 'payment_method', common\models\custom\Order::getPaymentMethodList(), ['prompt' => Yii::t('app', 'Select Payment Method')]); ?>

        </div>
    </label>
    <?= Html::error($oCheckoutOrder, 'payment_method', ['tag' => 'small', 'class' => 'error']); ?>
</div>

<div class="large-5 medium-5 small-12 columns large-centered medium-centered">
    <button type="submit"><?= Yii::t('app', 'Checkout') ?></button>
</div>

<?php ActiveForm::end(); ?>