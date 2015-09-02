<?php

use frontend\widgets\ActiveForm;
use yii\helpers\Url;
?>

<?php
$form = ActiveForm::begin([
            'id' => 'checkoutForm',
            'options' => ['class' => 'row'],
        ]);
?>

<?= $form->field($oCheckoutOrder, 'name')->textInput() ?>
<?= $form->field($oCheckoutOrder, 'email')->textInput() ?>
<?= $form->field($oCheckoutOrder, 'phone')->textInput() ?>
<?= $form->field($oCheckoutOrder, 'address')->textInput() ?>
<?= $form->field($oCheckoutOrder, 'comment')->textInput() ?>
<?= $form->field($oCheckoutOrder, 'payment_method')->dropDownList(common\models\custom\Order::getPaymentMethodList(), ['prompt' => Yii::t('app', 'Select Payment Method')]) ?>

<?= $form->field($oCheckoutOrder, 'agree', ['inputTemplate' => "{input}<a href='" . Url::to(['/site/page', 'slug' => 'terms-of-service']) . "'>" . Yii::t('app', 'I agree with Terms and Conditions') . "</a>"])->checkbox()->label(false); ?>

<div class="large-5 medium-5 small-12 columns large-centered medium-centered">
    <button type="submit"><?= Yii::t('app', 'Checkout') ?></button>
</div>

<?php ActiveForm::end(); ?>