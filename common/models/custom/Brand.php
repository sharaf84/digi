<?php
namespace common\models\custom;

use yii\helpers\Url;

class Brand extends \common\models\base\Tree {

    const ROOT = 2;
    
    public static function getFooterSlider() {
        return self::find()->andWhere(['lvl' => 1])->with('firstMedia')->all();
    }
    
    public static function getHeaderDropdown() {
        return self::find()->andWhere(['lvl' => 1])->all();
    }
    
    /**
     * @return string url to brand inner page
     */
    public function getInnerUrl() {
        return Url::to(['/store/' . $this->slug]);
    }

}
