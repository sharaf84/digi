<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use digi\metronic\grid\GridView;
use digi\metronic\widgets\Breadcrumbs;
use common\helpers\MediaHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Media */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Media';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-content media-index">

    <!-- BEGIN STYLE CUSTOMIZER -->
    <?= $this->render('@metronicTheme/layouts/themePanel.php'); ?>
    <!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?= Html::encode($this->title) ?>
    </h3>
    <div class="page-bar">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
        
    </div>

    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <!-- BEGIN UPLOAD-->
    <?php
    echo dosamigos\fileupload\FileUploadUI::widget([
        //'model' => null,
        //'attribute' => null,
        'name' => 'files[]',
        'url' => ['media/jqupload'],
        'gallery' => false,
        'fieldOptions' => [
        //'accept' => 'image/*'
        ],
        'clientOptions' => [
            'maxFileSize' => 2000000,
        //'paramName' => 'files'
        ],
        'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {$.pjax.reload({container:"#pjaxMediaGrid"});}',
            'fileuploaddestroyed' => 'function(e, data) {$.pjax.reload({container:"#pjaxMediaGrid"});}',
        ],
    ]);
    ?>
    <!-- END UPLOAD-->
    <!-- BEGIN GRID-->
    <div class="row">
        <div class="col-md-12">
            <!--Yii Table-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i><?= $this->title ?> Grid
                    </div>
                    <div class="tools">
                        <!--<a href="javascript:;" class="reload" onclick="$.pjax.reload({container:'#pjaxMediaGrid'});"></a>-->
                        <a href="javascript:;" class="collapse"></a>
                    </div>
                </div>
                <div class="portlet-body">

                    <?php
                    Pjax::begin([
                        'id' => 'pjaxMediaGrid',
                        //'enablePushState' => false, //don't update url with ajax request
                    ]);
                    ?>
                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>                
                    <?php
                    $contextModel = $this->context->model;
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'class' => \digi\sortable\grid\Column::className(),
                                'sortUrl' => Url::to(['sort']),
                                'sortModel' => $contextModel,
                                'sortAttr' => 'sort',
                            ],
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            //'model_id',
                            //'model',
                            //'path',
                            [
                                'attribute' => 'filename',
                                'format' => 'raw',
                                'value' => function ($model, $key, $index, $column) {
                                    return MediaHelper::gridDisplay($model);
                                },
                            ],
                            [
                                'attribute' => 'mime',
                                'filter' => $contextModel::getMimeList(),
                            ],
                            [
                                'attribute' => 'size',
                                'format' => ['shortSize', 0]
                            ],
                            'title',
                            // 'description:ntext',
                            // 'url:link',
                            // 'embed:ntext',
                            // 'status',
                            // 'type',
                            // 'sort',
                            // 'created',
                            // 'updated',
                            ['class' => 'digi\metronic\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
<?php Pjax::end(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- END GRID-->
    <!-- END PAGE CONTENT-->
</div>