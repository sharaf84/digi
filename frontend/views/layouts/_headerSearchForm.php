<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="large-3 medium-7 small-7 columns header-search-cont">
    <form action="<?= Url::to(['/store/search']) ?>" id="headerSearchForm" data-abide>
        <i class="md md-search"></i>
        <input type="text" name="SearchForm[key]" required pattern="^[-_ a-zA-Z0-9]+$"placeholder="<?= Yii::t('app', 'Search') ?>" value="<?= isset($this->params['searchKey']) ? Html::encode($this->params['searchKey']) : '' ?>">
        <span class="error"><?= Yii::t('app', 'Sorry, please write search key') ?></span>
    </form>
</div>