<?php

namespace common\models\custom;

use Yii;

/**
 * This is the model class for table "authclient".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $source
 * @property string $source_id
 * @property string $created
 * @property string $updated
 *
 * @property BaseUser $user
 */
class Authclient extends \common\models\base\Base {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'authclient';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'source', 'source_id'], 'required'],
            [['user_id'], 'integer'],
            [['source', 'source_id'], 'string', 'max' => 255],
            [['created', 'updated'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'source' => Yii::t('app', 'Source'),
            'source_id' => Yii::t('app', 'Source ID'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function setUserId($id) {
        return $this->user_id = $id;
    }

}
