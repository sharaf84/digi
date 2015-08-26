<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use digi\metronic\grid\GridView;
use digi\metronic\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel common\models\custom\search\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-content product-index">

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
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => '']) ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!--Yii Table-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i><?= $this->title ?> Grid
                    </div>
                    <div class="tools">
                        <!--<a href="javascript:;" class="reload" onclick="$.pjax.reload({container: #pjaxProductGrid});"></a>-->
                        <a href="javascript:;" class="collapse"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <?= Html::a('Add New <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn green']) ?> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php Pjax::begin(['id' => 'pjaxProductGrid']); ?>
                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>                
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'class' => \digi\sortable\grid\Column::className(),
                                'sortUrl' => Url::to(['sort']),
                                'sortModel' => '\common\models\custom\Product',
                                'sortAttr' => 'sort',
                            ],
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'title',
                            [
                                'attribute' => 'parent_id',
                                'format' => 'html',
                                'value' => function ($model, $key, $index, $column) {
                                    return $model->isParent() ? 'Parent' : 'Child of: ' . $model->parent->title;
                                }
                            ],
                            'category.name:text:Category',
                            'brand.name:text:Barnd',
                            'size.name:text:Size',
                            'flavor.name:text:Flavor',
                            [
                                'attribute' => 'color',
                                'format' => 'html',
                                'value' => function ($model, $key, $index, $column) {
                                    return '<span class="label label-sm" style="color:#000; background-color:' . $model->color . '"> ' . $model->color . ' </span>';
                                }
                            ],
                            'price',
                            'qty',
                            [
                                'attribute' => 'featured',
                                'filter' => [0 => 'No', 1 => 'Yes'],
                                'format' => 'html',
                                'value' => function ($model, $key, $index, $column) {
                            return $model->featured ? '<span class="badge badge-success"> Yes </span>' : '<span class="badge badge-danger"> No </span>';
                        },
                            ],
                            [
                                'class' => 'digi\metronic\grid\ActionColumn',
                                'template' => '{view} {update} {delete} {media}'
                            ],
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>