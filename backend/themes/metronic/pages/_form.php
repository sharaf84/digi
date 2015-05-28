<?php

use yii\helpers\Html;
use digi\metronic\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\base\Content */
/* @var $form digi\metronic\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="form-body">
    <h3 class="form-section">Note:  <small>fields marked with asterisk (*) are required.</small></h3>

    <?= $form->field($model, 'type')->hiddenInput(['value' => $model::TYPE])->label(false); ?>

    <?php //echo $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
    <?=
            $form->field($model, 'title')
            ->textInput(['maxlength' => 255])
            ->widget(\webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField::className())
    ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>

    <?=
            $form->field($model, 'body')
            ->widget(\dosamigos\ckeditor\CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'standerd' //full,standerd,basic
            ])
            ->widget(\webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField::className(), ['inputType' => 'textArea'])
    ?>

    <?=
    digi\metaTags\MetaTags::widget([
        'model' => $model,
        'form' => $form,
        'multiLanguage' => true,
    ])
    ?>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn green']) ?>
<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn default']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
