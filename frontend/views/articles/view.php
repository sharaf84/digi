<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Html::encode($oArticle->title);
Yii::$app->metaTags->register($oProduct);
?>
<div id="checkpoint-a" class="single-page blog-listing single-blog row">
    <div class="page-title large-12 medium-12 small-12 columns">
        <h2><?= Yii::t('app', 'Articles') ?></h2>
    </div>


    <article class="row main-article">
        <div class="article-image large-12 medium-12 small-12 columns">
            <img src="<?= $oArticle->getFeaturedImgUrl('main-article') ?>" alt="<?= Html::encode($oArticle->title) ?>">
        </div>

        <h3 class="large-12 medium-12 small-12 columns"><?= Html::encode($oArticle->title) ?></h3>

        <div class="large-12 medium-12 small-12 columns">
            <?= $oArticle->body ?>
        </div>

    </article>


    <div class="comments row">

        <div class="comments-title row">
            <div class="arrow-up"></div>
            <div class="large-2 medium-2 small-12 columns">
                <h3>Comments</h3>
            </div>
            <div class="large-3 medium-3 small-12 columns">
                <div class="comments-meta">
                    10 April 2015 - 109 Comments
                </div>
            </div>
        </div>

        <form class="comment-item row" action="/comments/send">
            <input type="hidden" name="userId" value="123">
            <input type="hidden" name="blogPostId" value="456">
            <span class="date-time">2 hours ago</span>
            <div class="large-1 medium-1 small-12 columns avatar-cont">
                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/article-list-item.jpg" alt="">
            </div>
            <div class="large-11 medium-11 small-12 columns">
                <h3>Userfirstname Userlastname</h3>
                <div class="comment-reply">
                    <textarea name="comment-reply" cols="10" rows="3" placeholder="Enter your reply here..."></textarea>
                    <button type="submit" class="shop-now submit-btn">Post</button>
                </div>
            </div>
        </form>

        <div class="comment-item row">
            <span class="date-time">2 hours ago</span>
            <div class="large-1 medium-1 small-12 columns avatar-cont">
                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/article-list-item.jpg" alt="">
            </div>
            <div class="large-11 medium-11 small-12 columns">
                <h3>Userfirstname Userlastname</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima reprehenderit sequi iste inventore, fugit harum possimus quisquam. Culpa maxime totam rerum ipsam necessitatibus ullam libero, porro voluptatibus, enim nisi ipsa.</p>
            </div>
        </div>

        <div class="comment-item row">
            <span class="date-time">2 hours ago</span>
            <div class="large-1 medium-1 small-12 columns avatar-cont">
                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/article-list-item.jpg" alt="">
            </div>
            <div class="large-11 medium-11 small-12 columns">
                <h3>Userfirstname Userlastname</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima reprehenderit sequi iste inventore, fugit harum possimus quisquam. Culpa maxime totam rerum ipsam necessitatibus ullam libero, porro voluptatibus, enim nisi ipsa.</p>
            </div>
        </div>

        <div class="comment-item row">
            <span class="date-time">2 hours ago</span>
            <div class="large-1 medium-1 small-12 columns avatar-cont">
                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/article-list-item.jpg" alt="">
            </div>
            <div class="large-11 medium-11 small-12 columns">
                <h3>Userfirstname Userlastname</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima reprehenderit sequi iste inventore, fugit harum possimus quisquam. Culpa maxime totam rerum ipsam necessitatibus ullam libero, porro voluptatibus, enim nisi ipsa.</p>
            </div>
        </div>

        <div class="comment-item row">
            <span class="date-time">2 hours ago</span>
            <div class="large-1 medium-1 small-12 columns avatar-cont">
                <img src="<?= Url::to('@frontThemeUrl') ?>/images/src/article-list-item.jpg" alt="">
            </div>
            <div class="large-11 medium-11 small-12 columns">
                <h3>Userfirstname Userlastname</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima reprehenderit sequi iste inventore, fugit harum possimus quisquam. Culpa maxime totam rerum ipsam necessitatibus ullam libero, porro voluptatibus, enim nisi ipsa.</p>
            </div>
        </div>

    </div>	


</div>
