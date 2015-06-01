<?php

namespace backend\controllers;

class ArticlesController extends base\ContentsController {

    public $model = '\common\models\custom\Article';
    public $searchModel = '\common\models\custom\search\Article';

}
