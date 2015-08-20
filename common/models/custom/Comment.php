<?php

namespace common\models\custom;


class Comment extends \yii2mod\comments\models\CommentModel {

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle() {
        return $this->hasOne(Article::className(), ['id' => 'entityId']);
    }


}
