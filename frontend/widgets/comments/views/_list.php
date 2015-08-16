<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $comment \yii2mod\comments\models\CommentModel */
/* @var $comments array */
/* @var $maxLevel null|integer coments max level */
?>


<?php
if (!empty($comments)) {
    foreach ($comments as $comment) {
        if ($comment->isActive) {
            ?>
            <div class="comment-item row">
                <span class="date-time"><?= $comment->getPostedDate(); ?></span>
                <div class="large-1 medium-1 small-12 columns avatar-cont">
                    <img src="<?= $comment->author->getFeaturedImgUrl('comment_avatar') ?>" alt="<?= $comment->getAuthorName(); ?>">
                </div>
                <div class="large-11 medium-11 small-12 columns">
                    <h3><?= $comment->getAuthorName(); ?></h3>
                    <p><?php echo $comment->getContent(); ?></p>
                </div>
            </div>
            <?php
        }
    }
}?>