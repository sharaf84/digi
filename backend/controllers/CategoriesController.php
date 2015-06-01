<?php

namespace backend\controllers;

class CategoriesController extends base\TreeController {
   
    public $model = '\common\models\custom\Category';
    public $searchModel = '\common\models\custom\search\Category';

}

