<?php

namespace backend\controllers;

use Yii;
use common\models\custom\Order;
use common\models\custom\search\Order as OrderSearch;
use backend\components\BaseController;
use yii\web\NotFoundHttpException;

/**
 * OrdersController implements the CRUD actions for Order model.
 */
class OrdersController extends BaseController {

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $model->new and $model->seen();
        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    /**
     * Swithch order status to be in progress.
     * @param integer $id
     * @return mixed
     */
    public function actionProgress($id) {
        $model = $this->findModel($id);
        $model->progress();
        return $this->redirect(['view', 'id' => $model->id]);
    }
    
    /**
     * Swithch order status to be delivered.
     * @param integer $id
     * @return mixed
     */
    public function actionDeliver($id) {
        $model = $this->findModel($id);
        $model->deliver();
        return $this->redirect(['view', 'id' => $model->id]);
    }
    
    /**
     * Cancel order.
     * @param integer $id
     * @return mixed
     */
    public function actionCancel($id) {
        $model = $this->findModel($id);
        $model->cancel();
        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate() {
//        $model = new Order();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                        'model' => $model,
//            ]);
//        }
//    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionUpdate($id) {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                        'model' => $model,
//            ]);
//        }
//    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id) {
//        $this->findModel($id)->delete();
//        if (Yii::$app->request->isAjax) {
//            $this->actionIndex();
//        }
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
