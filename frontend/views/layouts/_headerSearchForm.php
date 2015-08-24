<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="large-3 medium-7 small-7 columns header-search-cont">
    <form action="<?= Url::to(['/store/search']) ?>" id="headerSearchForm">
        <i class="md md-search"></i>
        <input type="search" name="SearchForm[key]" placeholder="<?= Yii::t('app', 'Search') ?>" value="<?= isset($this->params['searchKey']) ? Html::encode($this->params['searchKey']) : '' ?>">
    </form>
</div>