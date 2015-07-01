<?php use yii\helpers\Url; ?>

<aside class="left-off-canvas-menu">
    <ul class="off-canvas-list">
        <li><a href="#">Home</a></li>
        <li class="has-submenu">
            <a href="#">Store</a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Back</a></li>
                <?php include_once 'store-menu.php'; ?>
                <li class="has-submenu">
                    <a href="#">Brands</a>
                    <ul class="left-submenu">
                        <li class="back"><a href="#">Back</a></li>
                        <li><a href="#">BlenderBottle&trade;</a></li>
                        <li><a href="#">BPI</a></li>
                        <li><a href="#">FA Nutrition</a></li>
                        <li><a href="#">Grenade</a></li>
                        <li><a href="#">BlenderBottle&trade;</a></li>
                        <li><a href="#">BPI</a></li>
                        <li><a href="#">FA Nutrition</a></li>
                        <li><a href="#">Grenade</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#">The Mayors</a></li>
        <li><a href="#">The Traders</a></li>
        <li><a href="#">The Merchant Princes</a></li>
    </ul>
</aside>
