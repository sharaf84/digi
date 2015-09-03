<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use digi\metronic\grid\GridView;
use digi\metronic\widgets\Breadcrumbs;
use yii\helpers\Json;
use yii2mod\comments\models\enums\CommentStatus;
use yii2mod\editable\EditableColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \yii2mod\comments\models\CommentSearchModel */


$this->title = Yii::t('app', 'Comments');
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

                    <?php Pjax::begin(['id' => 'pjaxCommentGrid']); ?>
                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>                
                    <?php
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'attribute' => 'id',
                                'contentOptions' => ['style' => 'max-width: 50px;']
                            ],
                            [
                                'attribute' => 'content',
                                'contentOptions' => ['style' => 'max-width: 350px;'],
                                'value' => function ($model) {
                            return \yii\helpers\StringHelper::truncate($model->content, 100);
                        }
                            ],
                            [
                                'attribute' => 'createdBy',
                                'value' => function ($model) {
                                    return $model->getAuthorName();
                                },
                                'filter' => $commentModel::getListAuthorsNames(),
                                'filterInputOptions' => ['prompt' => 'Select Author', 'class' => 'form-control'],
                            ],
                            [
                                'class' => EditableColumn::className(),
                                'attribute' => 'status',
                                'url' => ['edit-comment'],
                                'value' => function ($model) {
                            return CommentStatus::getLabel($model->status);
                        },
                                'type' => 'select',
                                'editableOptions' => function ($model) {
                            return [
                                'source' => Json::encode(CommentStatus::listData()),
                                'value' => $model->status,
                            ];
                        },
                                'filter' => CommentStatus::listData(),
                                'filterInputOptions' => ['prompt' => 'Select Status', 'class' => 'form-control'],
                            ],
                            [
                                'attribute' => 'createdAt',
                                'value' => function ($model) {
                                    return Yii::$app->formatter->asDatetime($model->createdAt);
                                },
                                'filter' => false,
                            ],
                            [
                                'class' => 'digi\metronic\grid\ActionColumn',
                                'template' => '{update}{delete}',
                            ]
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