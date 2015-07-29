<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

$form = ActiveForm::begin([
            'id' => 'searchForm',
            'action' => Url::to(['/store/' . $slug ? $slug : 'search']),
            'method' => 'get',
            'options' => ['data-pjax' => true, 'class' => 'row'],
        ]);
echo $form->field($oSearchForm, 'key')->hiddenInput()->label(false);
echo $form->field($oSearchForm, 'alpha')->hiddenInput()->label(false);
?>
<div class="large-10 medium-10 small-12 columns">
    <div class="alphabet-filter">
        <ul class="pagination filters" id="alphabetChar">
            <li data-id="" class="<?= !$oSearchForm->alpha ? 'current' : '' ?>"><a href="#">All</a></li>
            <?php foreach (range('a', 'z') as $alpha) { ?>
                <li data-id="<?= $alpha ?>" class="<?= ($alpha == $oSearchForm->alpha) ? 'current' : '' ?>">
                    <a href="#"><?= $alpha ?></a>
                </li>
            <?php } ?>
            <li data-id=""><a href="#">...</a></li>
        </ul>
    </div>
</div>
<div class="large-2 medium-2 small-12 columns">
<?php //echo yii\widgets\LinkSorter::widget(['sort' => new yii\data\Sort(['attributes' => ['price']])])  ?>
    <div class="price-filter">
        <div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
            <?= Html::dropDownList('sort', Yii::$app->request->get('sort'), ['-price' => Yii::t('app', 'Higher First'), 'price' => Yii::t('app', 'Lower First')], ['id' => 'price-filter', 'prompt' => Yii::t('app', 'Sort By Price')]) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>