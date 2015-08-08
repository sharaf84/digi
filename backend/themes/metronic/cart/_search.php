<?php

use yii\helpers\Html;
use digi\metronic\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\custom\search\Cart */
/* @var $form digi\metronic\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
'action' => ['index'],
'method' => 'get',
'options' => ['data-pjax' => true],
]); ?>

<div class="form-body">
    <h3 class="form-section">Advanced Search. <small></small></h3>

        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'item_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>


</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>