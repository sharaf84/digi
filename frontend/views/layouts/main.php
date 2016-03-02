<?php

use yii\helpers\Html;
use yii\helpers\Url;

$isHome = Yii::$app->controller->action->id == 'home';
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html dir="<?php echo Yii::$app->language == 'ar' ? 'rtl' : 'ltr'; ?>" lang="<?php echo Yii::$app->language == 'ar' ? 'ar' : 'en'; ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|Bowlby+One+SC" rel="stylesheet" type="text/css">
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>

        <?php if (Yii::$app->language == 'ar') { ?>
            <link rel="stylesheet" href="<?= Url::to('@frontThemeUrl') ?>/css/build/app_ar.css" charset="utf-8">
            <link rel="stylesheet" href="/css/dev_ar.css" charset="utf-8">
        <?php } else { ?>
            <link rel="stylesheet" href="<?= Url::to('@frontThemeUrl') ?>/css/build/app.css" charset="utf-8">
            <link rel="stylesheet" href="/css/dev.css" charset="utf-8">
        <?php } ?>
            
        <?php include_once 'analyticstracking.php'; ?>
    </head>
    <body class="<?php echo Yii::$app->controller->action->id; ?>-page" id="<?php echo Yii::$app->language == 'ar' ? 'ar-layout' : 'en-layout'; ?>">
        <?php $this->beginBody() ?>
        <div data-offcanvas class="off-canvas-wrap">
            <div class="inner-wrap">
                <!-- BEGIN ASIDE -->
                <?php include_once 'aside.php'; ?>
                <!-- END ASIDE -->
                <!-- BEGIN HEADER -->
                <?php include_once 'flashMsg.php'; ?>
                <!-- END HEADER -->
                <!-- BEGIN HEADER -->
                <?php include_once 'header.php'; ?>
                <!-- END HEADER -->
                <!-- BEGIN CONTAINER -->
                <?php echo $content; ?>
                <!-- END CONTAINER -->
                <!-- BEGIN FOOTER -->
                <?php include_once 'footer.php'; ?>
                <!-- END FOOTER -->
                <a class="exit-off-canvas"></a>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
