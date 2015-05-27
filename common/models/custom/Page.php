<?php

namespace common\models\custom;

class Page extends \common\models\base\Content {
    
    //use \webvimark\behaviors\multilanguage\MultiLanguageTrait;

    //public $title_ar;

    const TYPE = 1;

//    public function behaviors() {
//        return [
//            'mlBehavior' => [
//                'class' => \webvimark\behaviors\multilanguage\MultiLanguageBehavior::className(),
//                'mlConfig' => [
//                    'db_table' => 'translations_with_string',
//                    'attributes' => ['title', 'name'],
//                    //Sets all virtual attributes at these routes ex: title_ar, title_fr, ... 
//                    'admin_routes' => [
//                        //'pages',
//                        //'pages/index',
//                        'pages/update',
//                        'pages/view',
//                    ],
//                ],
//            ],
//        ];
//    }

}
