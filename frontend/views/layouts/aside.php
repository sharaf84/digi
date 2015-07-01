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
        <li><a href="#">Articles</a></li>
        <li><a href="#">View Cart</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Language</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <form action="/">
                <input type="search" placeholder="Email Address...">
            </form>
        </li>
    </ul>
</aside>
