<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\custom\Cart */

$this->title = Yii::t('app', 'Create Cart');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Carts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-content cart-create">

    <!-- BEGIN STYLE CUSTOMIZER -->
    <?= $this->render('@metronicTheme/layouts/themePanel.php'); ?>
    <!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?= Html::encode($this->title); ?>
    </h3>
    <div class="page-bar">
        <?= \digi\metronic\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
        ?>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">            
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Cart  Form
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <?= $this->render('_form', [
                    'model' => $model,
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
