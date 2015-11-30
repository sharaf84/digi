<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div id="checkpoint-a" class="single-page row errorPage">

    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= Yii::t('app', 'Error Page') ?></h2>
    </div>

    <div class="admin-content">
        <h1><?= Html::encode($exception->statusCode) ?></h1>
        <?= nl2br(Html::encode(Yii::t('app', 'Sorry, the page you tried cannot be found.'))) ?>
    </div>

</div>
