<?php if (!empty($activities)) { ?>
    <div class="row">
        <div class="profile-section">
            <div class="section-header">
                <h3><span><?= Yii::t('app', 'Activities') ?></span></h3>
            </div>
            <div class="section-body">
                <?php foreach ($activities as $oComment) { ?>
                    <div class="activity-item">
                        <i class="md md-message"></i>
                        <a href="<?= $oComment->article->getInnerUrl() ?>">
                            <?= Yii::t('app', 'You commented on') ?> <?= $oComment->article->title ?> <?= $oComment->getPostedDate() ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
    