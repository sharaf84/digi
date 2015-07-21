<?php

namespace frontend\components;
use Yii;
use yii\web\Controller;
use frontend\assets\AppAsset;

/**
 * Base controller
 */
class BaseController extends Controller {
    
    public $oAuthUser = null;

    public function init() {
        parent::init();
        \webvimark\behaviors\multilanguage\MultiLanguageHelper::catchLanguage();
        $this->regiterAssets();
        $this->setAuthUser();
    }

    protected function regiterAssets() {
        AppAsset::register($this->view);
    }

    protected function setAuthUser(){
        $this->oAuthUser = !Yii::$app->user->isGuest ? \common\models\custom\User::findOne(Yii::$app->user->id) : null;
    }

}
