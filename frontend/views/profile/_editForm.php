<?php

use yii\helpers\Html;
use frontend\widgets\ActiveForm;

$form = ActiveForm::begin([
            'id' => 'editProfileForm',
            'options' => ['class' => 'row'],
        ]);
?>

<?= $form->field($oProfile, 'first_name')->textInput() ?>
<?= $form->field($oProfile, 'phone')->textInput() ?>
<?= $form->field($oProfile, 'city_id')->dropDownList(common\models\custom\City::getList(), ['prompt' => Yii::t('app', 'Select Your City')]) ?>
<?= $form->field($oProfile, 'address')->textInput() ?>
<?= $form->field($oProfile, 'bio')->textInput() ?>

<div class="large-5 medium-5 small-12 columns large-centered medium-centered">
    <button type="submit"><?= Yii::t('app', 'Save') ?></button>
</div>

<?php ActiveForm::end(); ?>
