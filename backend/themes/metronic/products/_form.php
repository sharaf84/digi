<?php

use yii\helpers\Html;
use digi\metronic\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\custom\Product */
/* @var $form digi\metronic\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="form-body">
    <h3 class="form-section">Note:  <small>fields marked with asterisk (*) are required.</small></h3>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <div class="form-group">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?=
            kartik\tree\TreeViewInput::widget([
                // single query fetch to render the tree
                'query' => \common\models\custom\Category::find()->andWhere('lvl > 0')->addOrderBy('root, lft'),
                'headingOptions' => ['label' => 'Categories'],
                'name' => 'Product[category_id]', // input name
                'value' => $model->category_id, // values selected (comma separated for multiple select)
                'asDropdown' => true, // will render the tree input widget as a dropdown.
                'multiple' => false, // set to false if you do not need multiple selection
                'fontAwesome' => false, // render font awesome icons
                'rootOptions' => [
                    'label' => '<i class="fa fa-tree"></i>',
                    'class' => 'text-success'
                ], // custom root label
                    //'options'         => ['disabled' => true],
            ]);
            ?>
        </div>
    </div>
    <?= $form->field($model, 'brand_id')->textInput() ?>

    <?= $form->field($model, 'size_id')->textInput() ?>

    <?= $form->field($model, 'flavor_id')->textInput() ?>

    <?=
            $form->field($model, 'title')
            ->textInput(['maxlength' => 255])
            ->widget(\webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField::className())
    ?>

    <?= $form->field($model, 'slug')->textInput() ?>

    <?php
    echo $form->field($model, 'color')->widget(\kartik\color\ColorInput::classname(), [
        'options' => ['placeholder' => 'Select color ...'],
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'featured')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

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

    <h3 class="form-section">SEO:  <small>Meta Tags</small></h3>

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
