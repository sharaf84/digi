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
        <!-- Facebook Conversion Code for Checkouts - TSS 01 -->
        <script>(function () {
                var _fbq = window._fbq || (window._fbq = []);
                if (!_fbq.loaded) {
                    var fbds = document.createElement('script');
                    fbds.async = true;
                    fbds.src = '//connect.facebook.net/en_US/fbds.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(fbds, s);
                    _fbq.loaded = true;
                }
            })();
            window._fbq = window._fbq || [];
            window._fbq.push(['track', '6026275186945', {'value': '0.00', 'currency': 'USD'}]);
        </script>
        <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6026275186945&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
        <!-- End Facebook Pixel-->
    </head>
<body class="<?php echo Yii::$app->controller->action->id; ?>-page" id="<?php echo Yii::$app->language == 'ar' ? 'ar-layout' : 'en-layout'; ?>">
    <?php include_once 'analyticstracking.php'; ?>
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
