<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SearchForm extends Model
{
    public $key;
    public $alpha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'alpha'], 'filter', 'filter' => 'trim'],
            [['key'], 'string', 'max' => 255],
            [['alpha'], 'match', 'pattern' => '/^[a-z]+$/'],//match alpha from a to z
            [['alpha'], 'string', 'min' => 1, 'max' => 1],
        ];
    }

 
}
