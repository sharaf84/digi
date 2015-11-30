<?php

use yii\helpers\Html;
use digi\metronic\widgets\ActiveForm;

//use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\custom\Product */
/* @var $form digi\metronic\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'productForm']); ?>

<div class="form-body">
    <h3 class="form-section">Note:  <small>fields marked with asterisk (*) are required.</small></h3>

    <?= $form->field($model, 'parent_id')->dropDownList($model->getOtherParentsList(), ['prompt' => 'Please Select', 'disabled' => !$model->isNewRecord]) ?>

    <div class="parentFields">
        <?=
                $form->field($model, 'title')
                ->textInput(['maxlength' => 255])
                ->widget(\webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField::className())
        ?>

        <?= !$model->isNewRecord ? $form->field($model, 'slug')->textInput() : '' ?>

        <?= $form->field($model, 'category_id')->dropDownList(common\models\custom\Category::getList(), ['prompt' => 'Please Select']) ?>

        <?= $form->field($model, 'brand_id')->dropDownList(common\models\custom\Brand::getList(), ['prompt' => 'Please Select']) ?>

        <?= $form->field($model, 'featured')->checkbox() ?>

    </div>

    <div class="childFields">
        <?= $form->field($model, 'size_id')->dropDownList(common\models\custom\Size::getList(), ['prompt' => 'Please Select']) ?>

        <?= $form->field($model, 'flavor_id')->dropDownList(common\models\custom\Flavor::getList(), ['prompt' => 'Please Select']) ?>

        <?php
        echo $form->field($model, 'color')->widget(\kartik\color\ColorInput::classname(), [
            'options' => ['placeholder' => 'Select color ...'],
        ]);
        ?>

        <?= $form->field($model, 'price')->textInput() ?>

        <?= $form->field($model, 'qty')->textInput() ?>
    </div>

    <?php //echo $form->field($model, 'status')->textInput()  ?>

    <div class="parentFields">
        <?= $form->field($model, 'brief')->textarea(['rows' => 6])->widget(\webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField::className(), ['inputType' => 'textArea']) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6])->widget(\webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField::className(), ['inputType' => 'textArea']) ?>

        <?=
                $form->field($model, 'body')
                ->widget(\dosamigos\ckeditor\CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'standerd' //full,standerd,basic
                ])
                ->widget(\webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField::className(), ['inputType' => 'textArea'])
        ?>
    </div>

    <div class="parentFields">
        <h3 class="form-section">SEO:  <small>Meta Tags</small></h3>

        <?=
        digi\metaTags\MetaTags::widget([
            'model' => $model,
            'form' => $form,
            'multiLanguage' => true,
        ])
        ?>
    </div>
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
