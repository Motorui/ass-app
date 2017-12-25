<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CentrosCusto;

/**
 * CentrosCustoSearch represents the model behind the search form about `app\models\CentrosCusto`.
 */
class CentrosCustoSearch extends CentrosCusto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ccusto', 'num_ccusto'], 'integer'],
            [['nome_ccusto'], 'safe'],
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
        $query = CentrosCusto::find();

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
            'id_ccusto' => $this->id_ccusto,
            'num_ccusto' => $this->num_ccusto,
        ]);

        $query->andFilterWhere(['like', 'nome_ccusto', $this->nome_ccusto]);

        return $dataProvider;
    }
}
