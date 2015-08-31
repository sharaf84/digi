<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use digi\metronic\widgets\DetailView;
use digi\metronic\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\custom\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-content order-view">

    <!-- BEGIN STYLE CUSTOMIZER -->
    <?= $this->render('@metronicTheme/layouts/themePanel.php'); ?>
    <!-- END STYLE CUSTOMIZER -->
    <!-- BEGIN PAGE HEADER-->
    <h3 class="page-title">
        <?= Html::encode($this->title) ?>
    </h3>
    <div class="page-bar">
        <?=
        \digi\metronic\widgets\Breadcrumbs::widget([
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
                        <?php
                        if ($model->canProgress()) {
                            echo Html::a(Yii::t('app', 'Progress'), ['progress', 'id' => $model->id], [
                                'class' => '',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to progress this order?'),
                                ],
                            ]);
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if ($model->canDeliver()) {
                            echo Html::a(Yii::t('app', 'Deliver'), ['deliver', 'id' => $model->id], [
                                'class' => '',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to deliver this order?'),
                                ],
                            ]);
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if ($model->canCancel()) {
                            echo Html::a(Yii::t('app', 'Cancel'), ['cancel', 'id' => $model->id], [
                                'class' => '',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to cancel this order?'),
                                ],
                            ]);
                        }
                        ?>
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
                        <i class="fa fa-cogs"></i>Order Details
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'user_id',
                            'name',
                            'email:email',
                            'phone',
                            'address:ntext',
                            'comment:ntext',
                            'amount',
                            [
                                'attribute' => 'payment_method',
                                //'format' => 'html',
                                'value' => $model->payment_method ? $model->paymentMethodList[$model->payment_method] : '(not set)',
                            ],
                            [
                                'attribute' => 'paid',
                                'format' => 'html',
                                'value' => $model->paid ? '<span class="badge badge-success"> Yes </span>' : '<span class="badge badge-danger"> No </span>',
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'html',
                                'value' => $model->status ? '<span class="label label-sm order-status-' . $model->status . '">' . $model->statusList[$model->status] . '</span>' : '(not set)',
                            ],
                            [
                                'attribute' => 'new',
                                'format' => 'html',
                                'value' => $model->new ? '<span class="badge badge-danger"> new </span>' : '<span class="badge badge-success"> seen </span>',
                            ],
                            'token',
                            'created',
                            'updated',
                        ],
                    ])
                    ?>

                    <h2 class="page-title">Order Items</h2>

                    <?php Pjax::begin(['id' => 'pjaxCartGrid']); ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getCartItems()]),
                        //'filterModel' => new \common\models\custom\search\Cart(),
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            //'order_id',
                            'item_id',
                            'title',
                            'price',
                            'qty',
                        //['class' => 'digi\metronic\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>

                    <h2 class="page-title">Order Transactions</h2>

                    <?php Pjax::begin(['id' => 'pjaxPaymentGrid']); ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getPayments()]),
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'gateway',
                            'transaction_reference',
                            [
                                'attribute' => 'response',
                                'format' => 'html',
                                'value' => function ($model, $key, $index, $column) {
                                    $response = '';
                                    foreach (json_decode($model->response) as $key => $val) {
                                        $response .= '<p><strong>' . $key . ': </strong>' . $val . '</p>';
                                    }
                                    return $response;
                                },
                            ],
                            'created',
                        //['class' => 'digi\metronic\grid\ActionColumn'],
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

