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
        //$this->setFooterBrands();
    }

    protected function regiterAssets() {
        AppAsset::register($this->view);
    }

    protected function setFooterBrands(){
        $this->view->params['footerBrands'] = \common\models\custom\Brand::getFooterSlider();
    }

}
