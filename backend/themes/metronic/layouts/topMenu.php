<?php

use yii\helpers\Url;
?>
<!-- BEGIN HORIZANTAL MENU -->
<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
<!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) sidebar menu below. So the horizontal menu has 2 seperate versions -->
<div class="hor-menu hidden-sm hidden-xs">
    <ul class="nav navbar-nav">
        <li class="classic-menu-dropdown">
            <a data-toggle="dropdown" href="javascript:;">
                Store <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-left">
                <li>
                    <a href="<?= Url::to(['/categories']) ?>"><i class="fa fa-glass"></i> Categories </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/brands']) ?>"><i class="fa fa-paw"></i> Brands </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/sizes']) ?>"><i class="fa fa-crop"></i> Sizes </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/flavors']) ?>"><i class="fa fa-cutlery"></i> Flavors </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/products']) ?>"><i class="fa fa-cubes"></i> Products </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= Url::to(['/articles']) ?>"> Articles </a>
        </li>
        <li>
            <a href="<?= Url::to(['/users']) ?>"> Users </a>
        </li>
        <li>
            <a href="<?= Url::to(['/orders']) ?>"> Orders </a>
        </li>
        <li class="classic-menu-dropdown">
            <a data-toggle="dropdown" href="javascript:;">
                Contents <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-left">
                <li>
                    <a href="<?= Url::to(['/pages']) ?>"><i class="fa fa-pencil"></i> Pages </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/cities']) ?>"><i class="fa fa-flag"></i> Cities </a>
                </li>
                <li>
                    <a href="<?= Url::to(['/comments']) ?>"><i class="fa fa-comments"></i> Comments </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
