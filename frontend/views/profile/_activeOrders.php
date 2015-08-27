<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php if (!empty($activeOrders)) { ?>
    <div class="row">
        <div class="profile-section order-history">

            <div class="as-table">
                <div class="row">
                    <div class="large-12 medium-12 small-12 columns as-caption">
                        <?= Yii::t('app', 'Order History') ?>
                    </div>
                </div>
                <div class="row as-table-head hide-for-small">
                    <div class="large-4 medium-4 small-4 columns as-table-head-cell">
                        <?= Yii::t('app', 'Product') ?>
                    </div>
                    <div class="large-2 medium-2 small-2 columns as-table-head-cell">
                        <?= Yii::t('app', 'Status') ?>
                    </div>
                    <div class="large-2 medium-2 small-2 columns as-table-head-cell">
                        <?= Yii::t('app', 'Price') ?>
                    </div>
                    <div class="large-1 medium-1 small-1 columns as-table-head-cell">
                        <?= Yii::t('app', 'Quantity') ?>
                    </div>
                    <div class="large-2 medium-2 small-2 columns as-table-head-cell">
                        <?= Yii::t('app', 'Total') ?>
                    </div>
                    <div class="large-1 medium-1 small-1 columns as-table-head-cell">
                        <?= Yii::t('app', 'Paid') ?>
                    </div>
                </div>
                <?php
                foreach ($activeOrders as $oOrder) {
                    $orderStatus = isset($oOrder->statusList[$oOrder->status]) ? $oOrder->statusList[$oOrder->status] : '';
                    foreach ($oOrder->cartItems as $oCart) {
                        ?>

                        <!-- Product Item -->
                        <div class="row as-table-row">
                            <div class="large-4 medium-4 small-12 columns as-table-cell">
                                <div class="row">
                                    <div class="large-3 medium-3 small-4 small-centered columns product-image-cont">
                                        <img src="<?= $oCart->item->getFeaturedImgUrl('cart-product') ?>" alt="<?= Html::encode($oCart->title) ?>">
                                    </div>
                                    <div class="large-9 medium-9 small-12 columns product-info-cont small-only-text-center">
                                        <h4><?= Html::encode($oCart->title) ?></h4>
                                        <p>
                                            <?php if ($oCart->item->isAccessory()) { ?>
                                                <strong><?= Yii::t('app', 'Color') ?>:</strong> <strong class="colorBox" style="background-color:<?= $oCart->item->color ?>"></strong>
                                            <?php } else { ?>
                                                <strong><?= Yii::t('app', 'Flavour') ?>:</strong> <?= $oCart->item->flavor->name ?>
                                            <?php } ?>
                                            - 
                                            <strong><?= Yii::t('app', 'Size') ?>:</strong> <?= $oCart->item->size->name ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="large-2 medium-2 small-3 columns as-table-cell">
                                <span class="<?= strtolower($orderStatus) ?>"><?= $orderStatus ?></span>
                            </div>
                            <div class="large-2 medium-2 small-3 columns as-table-cell">
                                <span><?= $oCart->price ?> <?= Yii::t('app', CURRENCY_SYMBOL) ?></span>
                            </div>
                            <div class="large-1 medium-1 small-3 columns as-table-cell">
                                <span><?= $oCart->qty ?></span>
                            </div>
                            <div class="large-2 medium-2 small-3 columns as-table-cell">
                                <span><?= $oCart->getTotalPrice() ?> <?= Yii::t('app', CURRENCY_SYMBOL) ?></span>
                            </div>
                            <div class="large-1 medium-1 small-3 columns as-table-cell">
                                <span><?= $oCart->order->paid ? Yii::t('app', 'yes') : Yii::t('app', 'No') ?></span>
                            </div>
                        </div>
                        <!-- [/] Product Item -->
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php } ?>
