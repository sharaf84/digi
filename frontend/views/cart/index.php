<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Cart');
?>

<?php
Pjax::begin([
    'id' => 'pjaxCart',
    'enablePushState' => false
]);
?>

<div class="single-page shopping-cart">
    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Cart') ?></h2>
        </div>
    </div>
    <?php if (empty($cartItems)) { ?>
        <div class="row">
            <div class="shopping-cart-empty">
                <?= Yii::t('app', 'Your shopping cart is empty!') ?>
            </div>
        </div>

        <?php
    } else {
        ActiveForm::begin([
            'options' => ['data-pjax' => true, 'class' => 'as-table checkout-form'],
        ]);
        ?>

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
            ?>

            <div class="row as-table-row single-product <?= $oCart->isOverflow() ? 'cart-overflow' : ''; ?>" data-product>
                <!-- Product Item -->
                
                <?php if ($oCart->isOverflow()) { ?>
                    <?php if ($oCart->item->inStock()) { ?>
                        <a href="<?= Url::to(['/cart/match', 'id' => $oCart->item_id]) ?>" data-method="post" class="cart-overflow">
                            <?= Yii::t('app', 'Sorry, available quantity is {qty}. Match Quantity.', ['qty' => $oCart->item->qty]) ?>
                        </a>
                    <?php } else { ?>
                        <a href="<?= Url::to(['/cart/remove', 'id' => $oCart->item_id]) ?>" data-method="post" class="cart-overflow">
                            <?= Yii::t('app', 'Sorry, item is out of stoke. Remove Item.') ?>
                        </a>
                    <?php } ?>
                <?php } ?>
                
                <?php
                echo Html::a('<span class="remove-product">&times;</span>', Url::to(['/cart/remove', 'id' => $oCart->item_id]), [
                    //'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                ]);
                ?>
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
                        <?php if ($oCart->canIncrease()) { ?>
                            <a href="<?= Url::to(['/cart/increase', 'id' => $oCart->item_id]) ?>" data-method="post"><i class="fa fa-chevron-up increase-quantity"></i></a>
                        <?php } else { ?>
                            <i class="fa fa-chevron-up increase-quantity disable"></i>
                        <?php } ?>

                        <?php if ($oCart->canDecrease() && !$oCart->isOverflow()) { ?>
                            <a href="<?= Url::to(['/cart/decrease', 'id' => $oCart->item_id]) ?>" data-method="post"><i class="fa fa-chevron-down decrease-quantity"></i></a>
                        <?php } else { ?>
                            <i class="fa fa-chevron-down decrease-quantity disable"></i>
                        <?php } ?>

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

        <?php
        ActiveForm::end();
    }
    ?>
</div>
<?php Pjax::end(); ?>