<?php

namespace frontend\controllers;

use Yii;

/**
 * Profile controller
 */
class ProfileController extends \frontend\components\BaseController {
    
    public $defaultAction = 'view';
    
    public function actionView() {
        return $this->render('view');
    }

}
