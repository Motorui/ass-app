<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TotalMensal;

/**
 * TotalMensalSearch represents the model behind the search form about `app\models\TotalMensal`.
 */
class TotalMensalSearch extends TotalMensal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_total_mensal', 'ano', 'janeiro', 'fevereiro', 'marco', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'], 'integer'],
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
        $query = TotalMensal::find();

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
            'id_total_mensal' => $this->id_total_mensal,
            'ano' => $this->ano,
            'janeiro' => $this->janeiro,
            'fevereiro' => $this->fevereiro,
            'marco' => $this->marco,
            'abril' => $this->abril,
            'maio' => $this->maio,
            'junho' => $this->junho,
            'julho' => $this->julho,
            'agosto' => $this->agosto,
            'setembro' => $this->setembro,
            'outubro' => $this->outubro,
            'novembro' => $this->novembro,
            'dezembro' => $this->dezembro,
        ]);

        return $dataProvider;
    }
}
