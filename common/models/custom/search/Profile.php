<?php

namespace common\models\custom\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\custom\Profile as ProfileModel;

/**
 * Profile represents the model behind the search form about `common\models\custom\Profile`.
 */
class Profile extends ProfileModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'city_id', 'gender', 'status'], 'integer'],
            [['first_name', 'last_name', 'bio', 'address', 'country_phone_code', 'phone', 'created', 'updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProfileModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'gender' => $this->gender,
            'status' => $this->status,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'bio', $this->bio])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'country_phone_code', $this->country_phone_code])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
