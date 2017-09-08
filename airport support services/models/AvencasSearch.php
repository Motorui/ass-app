<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Avencas;

/**
 * AvencasSearch represents the model behind the search form about `app\models\Avencas`.
 */
class AvencasSearch extends Avencas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_avenca', 'id_parque', 'num_avenca'], 'integer'],
            [['data_avenca'], 'safe'],
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
        $query = Avencas::find();

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
            'id_avenca' => $this->id_avenca,
            'id_parque' => $this->id_parque,
            'num_avenca' => $this->num_avenca,
            'data_avenca' => $this->data_avenca,
        ]);

        return $dataProvider;
    }
}
