<?php

namespace frontend\components;
use Yii;
use yii\web\Controller;
use frontend\assets\AppAsset;

/**
 * Base controller
 */
class BaseController extends Controller {
    

    public function init() {
        parent::init();
        \webvimark\behaviors\multilanguage\MultiLanguageHelper::catchLanguage();
        $this->regiterAssets();
    }

    protected function regiterAssets() {
        AppAsset::register($this->view);
    }

}
