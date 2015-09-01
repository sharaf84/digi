<?php

$this->title = Yii::t('app', 'Edit Profile');
?>

<div class="single-page register-page">
    <div id="checkpoint-a" class="row">
        <div class="page-title large-12 medium-12 small-12 columns">
            <h2><?= Yii::t('app', 'Edit Profile')?></h2>
        </div>
    </div>

    <?= $this->render('_editForm', ['oProfile' => $oProfile])?>
    
</div>