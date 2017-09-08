<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resumo;

/**
 * ResumoSearch represents the model behind the search form about `app\models\Resumo`.
 */
class ResumoSearch extends Resumo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resumo_id', 'total_total', 'total_chegadas', 'total_partidas', 'total_36h', 'chegadas_36h', 'partidas_36h', 'total_90m_36h', 'chegadas_90m_36h', 'partidas_90m_36h', 'total_90m', 'chegadas_90m', 'partidas_90m'], 'integer'],
            [['resumo_mes'], 'safe'],
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
        $query = Resumo::find();

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
            'resumo_id' => $this->resumo_id,
            'resumo_mes' => $this->resumo_mes,
            'total_total' => $this->total_total,
            'total_chegadas' => $this->total_chegadas,
            'total_partidas' => $this->total_partidas,
            'total_36h' => $this->total_36h,
            'chegadas_36h' => $this->chegadas_36h,
            'partidas_36h' => $this->partidas_36h,
            'total_90m_36h' => $this->total_90m_36h,
            'chegadas_90m_36h' => $this->chegadas_90m_36h,
            'partidas_90m_36h' => $this->partidas_90m_36h,
            'total_90m' => $this->total_90m,
            'chegadas_90m' => $this->chegadas_90m,
            'partidas_90m' => $this->partidas_90m,
        ]);

        return $dataProvider;
    }
}
