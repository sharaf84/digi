<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Cart');
?>

<?php Pjax::begin(['id' => 'pjaxCart']); ?>
<div class="single-page shopping-cart">
    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Cart') ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="shopping-cart-empty <?= !empty($cartItems) ? 'hide' : ''; ?>">
            <?= Yii::t('app', 'Your shopping cart is empty!') ?>
        </div>
    </div>

    <?php if (!empty($cartItems)) { ?>
        <form class="as-table checkout-form" action="." method="post">
            <div class="row as-table-head hide-for-small">
                <div class="large-6 medium-6 small-12 columns as-table-head-cell">
                    Product
                </div>
                <div class="large-2 medium-2 small-12 columns as-table-head-cell">
                    Price
                </div>
                <div class="large-2 medium-2 small-12 columns as-table-head-cell">
                    Quantity
                </div>
                <div class="large-2 medium-2 small-12 columns as-table-head-cell">
                    Total
                </div>
            </div>

            <?php
            $itemTotalPrice = $cartTotalPrice = 0;
            foreach ($cartItems as $oCart) {
                $itemTotalPrice = $oCart->item->price * $oCart->qty;
                $cartTotalPrice += $itemTotalPrice;
                //var_dump($oCart->item->atCart());
                ?>
                <!-- Product Item -->
                <div class="row as-table-row single-product" data-product>
                    <a href="<?= Url::to(['/cart/remove', 'id' => $oCart->item_id]) ?>"><span class="remove-product">&times;</span></a>
                    <div class="large-6 medium-6 small-12 columns as-table-cell">
                        <div class="row">
                            <div class="large-3 medium-3 small-4 small-centered columns product-image-cont">
                                <img src="<?= $oCart->item->getFeaturedImgUrl('cart-product') ?>" alt="<?= Html::encode($oCart->item->title) ?>">
                            </div>
                            <div class="large-9 medium-9 small-12 columns product-info-cont small-only-text-center">
                                <h4><?= Html::encode($oCart->item->title); ?></h4>
                                <p>
                                    <?php if ($oCart->item->isAccessory()) { ?>
                                        <strong><?= Yii::t('app', 'Color') ?>:</strong> <?= $oCart->item->color ?>
                                    <?php } else { ?>
                                        <strong><?= Yii::t('app', 'Flavour') ?>:</strong> <?= $oCart->item->flavor->name ?>
                                    <?php } ?>
                                    - 
                                    <strong><?= Yii::t('app', 'Size') ?>:</strong> <?= $oCart->item->size->name ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="large-2 medium-2 small-4 columns as-table-cell">
                        <span data-product-price="<?= $oCart->item->price ?>"><?= $oCart->item->price ?> <?= CURRENCY_SYMBOL ?></span>
                    </div>
                    <div class="large-2 medium-2 small-4 columns as-table-cell">
                        <span class="cart-quantity-cont">
                            <a href="<?= Url::to(['/cart/increase', 'id' => $oCart->item_id]) ?>"><i class="fa fa-chevron-up increase-quantity"></i></a>
                            <a href="<?= Url::to(['/cart/decrease', 'id' => $oCart->item_id]) ?>"><i class="fa fa-chevron-down decrease-quantity"></i></a>
                            <input type="number" name="productQuantity[]" readonly = "readonly" min="1" max="<?= $oCart->item->qty ?>" value="<?= $oCart->qty ?>" class="cart-quantity">
                        </span>
                    </div>
                    <div class="large-2 medium-2 small-4 columns as-table-cell">
                        <span data-product-total="<?= $itemTotalPrice ?>"><?= $itemTotalPrice ?> <?= CURRENCY_SYMBOL ?></span>
                    </div>
                </div>
                <!-- [/] Product Item -->
            <?php } ?>

            <div class="row as-table-row">
                <div class="large-2 medium-2 small-12 columns right checkout-total" data-checkout-toal>
                    Total: <span><?= $cartTotalPrice ?> <?= CURRENCY_SYMBOL ?></span>
                </div>
            </div>

            <div class="row as-table-row checkout-btn-cont">
                <div class="large-2 medium-2 small-12 columns right">
                    <button type="submit">Checkout</button>
                </div>
            </div>


        </form>
    <?php } ?>
</div>
<?php Pjax::end(); ?>