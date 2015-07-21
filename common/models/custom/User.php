<?php

namespace common\models\custom;

use common\models\custom\Profile;

class User extends \common\models\base\User {

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile() {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

}
