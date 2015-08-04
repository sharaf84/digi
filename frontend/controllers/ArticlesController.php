<?php

namespace frontend\controllers;

use Yii;
use common\models\custom\Article;
use yii\web\NotFoundHttpException;

/**
 * Articles controller
 */
class ArticlesController extends \frontend\components\BaseController {

    public function actionIndex() {

        $oArticlesDP = new \yii\data\ActiveDataProvider([
            'query' => Article::find()->orderBy(['date' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 7,
            ],
        ]);

        return $this->render('index', [
                    'oArticlesDP' => $oArticlesDP,
                    'mostReadArticles' => Article::getMostRead(3),
        ]);
    }

    public function actionView($slug) {
        $oArticle = Article::find()->where(['slug' => $slug])->with('firstMedia')->one();
        if(!$oArticle)
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        return $this->render('view', [
                    'oArticle' => $oArticle,
                    'mostReadArticles' => Article::getMostRead(3),
        ]);
    }

}
