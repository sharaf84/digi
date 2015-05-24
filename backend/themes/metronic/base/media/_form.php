<?php

use yii\helpers\Html;
use digi\metronic\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Media */
/* @var $form digi\metronic\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="form-body">
    <h3 class="form-section">Note:  <small>fields marked with asterisk (*) are required.</small></h3>

        <?= $form->field($model, 'model_id')->textInput() ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'mime')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'size')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'embed')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>


</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn green']) ?>
<?= Html::resetButton('Reset', ['class' => 'btn default']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
