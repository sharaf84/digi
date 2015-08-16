<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$form = ActiveForm::begin([
            'id' => 'productForm',
            'action' => $oProduct->getInnerUrl(),
            'method' => 'get',
            'options' => ['data-pjax' => true, 'class' => 'row'],
        ]);
?>

<!-- Product ID -->
<!--<input type="hidden" name="productId" value="1234567890">-->

<div class="large-4 medium-4 small-12 columns select-component">
    <i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
    <?= Html::activeDropDownList($oProductForm, 'size', $sizes, ['prompt' => Yii::t('app', 'Choose Size')]); ?>
</div>
<div class="large-4 medium-4 small-12 columns select-component end">
    <i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
        <?php 
        echo $oProduct->isAccessory() 
                ? Html::activeDropDownList($oProductForm, 'color', $colors, ['prompt' => Yii::t('app', 'Choose Color'), 'options' =>['#ffff00' => ['style' => 'background:#ffff00;color:#ffff00']]] ) 
                : Html::activeDropDownList($oProductForm, 'flavor', $flavors, ['prompt' => Yii::t('app', 'Choose Flavor')]) ;
        ?>
</div>
</form>
<?php ActiveForm::end(); ?>