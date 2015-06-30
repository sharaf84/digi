<?php
	use yii\helpers\Html;
	$isHome 	= Yii::$app->controller->action->id == 'home';
	$isArabic 	= true;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="utf-8" content="width=device-width,initial-scale=1">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|Bowlby+One+SC" rel="stylesheet" type="text/css">
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body class="<?php echo Yii::$app->controller->action->id; ?>-page<?php echo $isArabic ? ' ar-layout' : ''; ?>">
        <?php $this->beginBody() ?>
        <div data-offcanvas class="off-canvas-wrap">
            <div class="inner-wrap">
                <a href="#" class="left-off-canvas-toggle, menu-icon, show-for-touch"><i class="md md-menu"></i></a>
                <!-- BEGIN ASIDE -->
                <?php include_once 'aside.php'; ?>
                <!-- END ASIDE -->

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
        <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
