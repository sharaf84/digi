<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Checkout');
?>

<div class="single-page checkout-page">

    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Checkout') ?></h2>
        </div>
    </div>

    <?= $this->render('_checkoutForm', ['oCheckoutOrder' => $oCheckoutOrder]) ?>
</div>