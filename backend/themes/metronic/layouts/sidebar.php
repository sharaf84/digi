<?php

use yii\helpers\Url;
?>
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu page-sidebar-menu-closed" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>

            <li class="start <?= (in_array(Yii::$app->controller->id, ['categories', 'brands', 'sizes', 'flavors', 'products']) ) ? 'active open' : '' ?>">
                <a href="javascript:;">
                    <i class="fa fa-database"></i>
                    <span class="title">Store</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>

                <ul class="sub-menu">
                    <li class="<?= (Yii::$app->controller->id == 'categories') ? 'active' : '' ?>">
                        <a href="<?= Url::to(['/categories']) ?>"><i class="fa fa-glass"></i> Categories </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'brands') ? 'active' : '' ?>">
                        <a href="<?= Url::to(['/brands']) ?>"><i class="fa fa-paw"></i> Brands </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'sizes') ? 'active' : '' ?>">
                        <a href="<?= Url::to(['/sizes']) ?>"><i class="fa fa-crop"></i> Sizes </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'flavors') ? 'active' : '' ?>">
                        <a href="<?= Url::to(['/flavors']) ?>"><i class="fa fa-cutlery"></i> Flavors </a>
                    </li>
                    <li class="<?= (Yii::$app->controller->id == 'products') ? 'active' : '' ?>">
                        <a href="<?= Url::to(['/products']) ?>"><i class="fa fa-cubes"></i> Products </a>
                    </li>
                </ul>
            </li>
            
            <li class="<?= (Yii::$app->controller->id == 'articles') ? 'active' : '' ?>">
                <a href="<?= Url::to(['/articles']) ?>">
                    <i class="fa fa-book"></i>
                    <span class="title">Articles</span> 
                </a>
            </li>
            
            <li class="<?= (Yii::$app->controller->id == 'pages') ? 'active' : '' ?>">
                <a href="<?= Url::to(['/pages']) ?>">
                    <i class="fa fa-pencil"></i>
                    <span class="title">Pages</span> 
                </a>
            </li>
            
            <li class="<?= (Yii::$app->controller->id == 'users') ? 'active' : '' ?>">
                <a href="<?= Url::to(['/users']) ?>">
                    <i class="fa fa-user"></i>
                    <span class="title">Users</span> 
                </a>
            </li>
            
            <li class="last <?= (Yii::$app->controller->id == 'orders') ? 'active' : '' ?>">
                <a href="<?= Url::to(['/orders']) ?>">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="title">Orders</span> 
                </a>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>