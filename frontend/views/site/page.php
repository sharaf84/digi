<?php

use yii\helpers\Html;

$this->title = Html::encode($oPage->title);
Yii::$app->metaTags->register($oPage);
?>

<div id="checkpoint-a" class="single-page about-us-page row">

    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= Html::encode($oPage->title) ;?></h2>
    </div>

    <div class="admin-content"><?= $oPage->body ?></div>

</div>
