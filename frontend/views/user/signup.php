<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Sign Up');
?>

<div class="single-page register-page">
    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Sign Up')?></h2>
        </div>
    </div>

    <?= $this->render('_signupForm', ['oSignupForm' => $oSignupForm]) ?>
</div>