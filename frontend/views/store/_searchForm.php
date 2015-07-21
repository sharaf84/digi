<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$form = ActiveForm::begin([
            'id' => 'searchForm',
            'action' => Url::to(['/store/' . $category ? $category : 'search']),
            'method' => 'get',
            'options' => ['data-pjax' => true, 'class' => 'row'],
        ]);
echo $form->field($oSearchForm, 'key')->hiddenInput()->label(false);
echo $form->field($oSearchForm, 'alpha')->hiddenInput()->label(false);
?>
<div class="large-10 medium-10 small-12 columns">
    <div class="alphabet-filter">
        <input type="hidden" id="filterCharValue">
        <ul class="pagination filters">
            <li data-id="" class="current"><a href="<?= Url::current() ?>">All</a></li>
            <li data-id="a"><a href="#">a</a></li>
            <li data-id="b"><a href="#">b</a></li>
            <li data-id="c"><a href="#">c</a></li>
            <li data-id="d"><a href="#">d</a></li>
            <li data-id="e"><a href="#">e</a></li>
            <li data-id="f"><a href="#">f</a></li>
            <li data-id="g"><a href="#">g</a></li>
            <li data-id="h"><a href="#">h</a></li>
            <li data-id="i"><a href="#">i</a></li>
            <li data-id="j"><a href="#">j</a></li>
            <li data-id="k"><a href="#">k</a></li>
            <li data-id="l"><a href="#">l</a></li>
            <li data-id="m"><a href="#">m</a></li>
            <li data-id="n"><a href="#">n</a></li>
            <li data-id="o"><a href="#">o</a></li>
            <li data-id="p"><a href="#">p</a></li>
            <li data-id="q"><a href="#">q</a></li>
            <li data-id="r"><a href="#">r</a></li>
            <li data-id="s"><a href="#">s</a></li>
            <li data-id="t"><a href="#">t</a></li>
            <li data-id="u"><a href="#">u</a></li>
            <li data-id="v"><a href="#">v</a></li>
            <li data-id="w"><a href="#">w</a></li>
            <li data-id="x"><a href="#">x</a></li>
            <li data-id="y"><a href="#">y</a></li>
            <li data-id="z"><a href="#">z</a></li>
            <li data-id="..."><a href="#">...</a></li>
        </ul>
    </div>
</div>
<div class="large-2 medium-2 small-12 columns">
    <?php //echo yii\widgets\LinkSorter::widget(['sort' => new yii\data\Sort(['attributes' => ['price']])]) ?>
    <div class="price-filter">
        <div class="select-component"><i class="md md-arrow-drop-up"></i><i class="md md-arrow-drop-down"></i>
            <select id="price-filter" name="sort">
                <option value="">Sort By Price</option>
                <option value="-price">Price: Higher First</option>
                <option value="price">Price: Lower First</option>
            </select>
        </div>
    </div>
</div>
<input type="submit">
<?php ActiveForm::end(); ?>