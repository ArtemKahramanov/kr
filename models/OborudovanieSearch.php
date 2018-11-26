<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Oborudovanie;

/**
 * OborudovanieSearch represents the model behind the search form of `app\models\Oborudovanie`.
 */
class OborudovanieSearch extends Oborudovanie
{
    public $date_end;
    public $status;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'catalog_oborudovania_id', 'cabinet_id'], 'integer'],
            [['number', 'status', 'retired'], 'safe'],
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
        $query = Oborudovanie::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
                'id' => $this->id,
                'catalog_oborudovania_id' => $this->catalog_oborudovania_id,
                'cabinet_id' => $this->cabinet_id,
            ]);

        // Оборудование в наличии
        if($this->status !== 'off') {
            $query->andWhere(['retired' => null]);
        }else{
            // Списанное оборудование
            $query->andWhere(['!=', 'retired', 0]);
        }

        $select_date_end = 'DATE_ADD(start_operation, INTERVAL catalog_oborudovania.life DAY)';
        $query->innerJoinWith('catalogOborudovania')->addSelect(['*', $select_date_end . ' as date_end']);

        // Поиск оборудования которое пора списывать
        $now = date('Y-m-d');
        if($this->retired == 1){
            $query->andWhere(['retired' => null]);
            $query->andWhere(['<=', $select_date_end, $now]);
            $query->orderBy('date_end');
        }

        if($this->status == 'off'){
            $query->andWhere(['!=', 'retired', 0]);
        }


        $query->andFilterWhere(['like', 'number', $this->number]);


        return $dataProvider;
    }
}
