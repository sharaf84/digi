<?php

use yii\helpers\Url;
use infoweb\analytics\Analytics;

$this->title = 'TSS Dashboard';
?>
<div class="page-content">
   

    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        TSS <small>dashboard & statistics</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">Dashboard</a>
            </li>

        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple-plum">
                <div class="visual">
                    <i class="fa fa-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?= $totalUsersCount ?>
                    </div>
                    <div class="desc">
                        Total Users
                    </div>
                </div>
                <a class="more" href="<?= Url::to(['/users']) ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red-intense">
                <div class="visual">
                    <i class="fa fa-gbp"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?= $totalOrdersRevenu ?> <?= CURRENCY_SYMBOL ?>
                    </div>
                    <div class="desc">
                        Total Revenue
                    </div>
                </div>
                <a class="more" href="<?= Url::to(['/orders']) ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?= $totalOrdersCount ?>
                    </div>
                    <div class="desc">
                        Total Orders
                    </div>
                </div>
                <a class="more" href="<?= Url::to(['/orders']) ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue-madison">
                <div class="visual">
                    <i class="fa fa-cubes"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?= $totalProductsCount ?>
                    </div>
                    <div class="desc">
                        Total Products
                    </div>
                </div>
                <a class="more" href="<?= Url::to(['/products']) ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <!--        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
        <?php //echo $totalCommentsCount ?>
                            </div>
                            <div class="desc">
                                Total Comments
                            </div>
                        </div>
                        <a class="more" href="#">
                            View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>-->
    </div>

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
    <div class="row ">
        <div class="col-md-6 col-sm-6">
            <div class="portlet box digi-color">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>Top Users
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div data-rail-visible="0" data-always-visible="1" style="overflow: hidden; width: auto; height: 300px;" class="scroller" data-initialized="1">
                            <ul class="feeds">
                                <?php foreach ($topUsers as $oOrder) { ?>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm">
                                                        <!--<i class="fa fa-user"></i>-->
                                                        <img src="<?php echo $oOrder->user->getFeaturedImgUrl('25*25') ?>" alt="<?php echo $oOrder->user->getName() ?>">
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc">
                                                        <?= $oOrder->user->getName() ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date">
                                                <?= $oOrder->amount ?> <?= CURRENCY_SYMBOL ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div><div class="slimScrollBar" style="background: rgb(187, 187, 187) none repeat scroll 0% 0%; width: 7px; position: absolute; opacity: 0.4; border-radius: 7px; z-index: 99; right: 1px; top: 137px; height: 163.339px; display: block;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                    <div class="scroller-footer">
                        <div class="btn-arrow-link pull-right">
                            <a href="<?= Url::to(['/users']) ?>">See All Users</a>
                            <i class="icon-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="portlet box digi-color">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cubes"></i>Top Products
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div data-rail-visible="0" data-always-visible="1" style="overflow: hidden; width: auto; height: 300px;" class="scroller" data-initialized="1">
                            <ul class="feeds">
                                <?php foreach ($topProducts as $oProduct) { ?>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm">
                                                        <!--<i class="fa fa-cubes"></i>-->
                                                        <img src="<?php echo $oProduct->getFeaturedImgUrl('25*25') ?>" alt="<?php echo $oProduct->title ?>">

                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc">
                                                        <?= $oProduct->title ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date">
                                                sold: <?= $oProduct->sold ?>  
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div><div class="slimScrollBar" style="background: rgb(187, 187, 187) none repeat scroll 0% 0%; width: 7px; position: absolute; opacity: 0.4; border-radius: 7px; z-index: 99; right: 1px; top: 137px; height: 163.339px; display: block;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                    <div class="scroller-footer">
                        <div class="btn-arrow-link pull-right">
                            <a href="<?= Url::to(['/products']) ?>">See All Products</a>
                            <i class="icon-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <!--START ANALYTICS-->
    <?php include_once 'analytics.php'; ?>
    <!--END ANALYTICS-->

</div>
