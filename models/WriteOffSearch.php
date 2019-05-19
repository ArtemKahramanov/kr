<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WriteOff;

/**
 * WriteOffSearch represents the model behind the search form of `app\models\WriteOff`.
 */
class WriteOffSearch extends WriteOff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cabinet_id', 'location_id', 'oborudovanie_id'], 'integer'],
            [['number'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = WriteOff::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cabinet_id' => $this->cabinet_id,
            'location_id' => $this->location_id,
            'oborudovanie_id' => $this->oborudovanie_id,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }
}
