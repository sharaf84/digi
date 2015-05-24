<?php

namespace backend\components;

use Yii;
use yii\web\Controller;
use backend\assets\AppAsset;
use digi\metronic\AdminAsset as MetronicAdminAsset;

/**
 * Base controller
 */
class BaseController extends Controller {

    public function init() {
        parent::init();
        //\webvimark\behaviors\multilanguage\MultiLanguageHelper::catchLanguage();
        $this->regiterAssets();
        
    }

    public function actions() {
        return [
            'sort' => [
                'class' => \digi\sortable\actions\Sort::className(),
            ],
        ];
    }

    protected function regiterAssets() {
        MetronicAdminAsset::register($this->view);
        AppAsset::register($this->view);
    }

}
