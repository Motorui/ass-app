<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FormacoesColaborador;
use app\models\Colaboradores;

/**
 * FormacoesColaboradorSearch represents the model behind the search form about `app\models\FormacoesColaborador`.
 */
class FormacoesColaboradorSearch extends FormacoesColaborador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fc', 'id_formacao', 'id_colaborador'], 'integer'],
            [['data_formacao', 'caducidade'], 'safe'],
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
        $query = FormacoesColaborador::find();

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
            'id_fc' => $this->id_fc,
            'id_formacao' => $this->id_formacao,
            'id_colaborador' => $this->id_colaborador,
            'data_formacao' => $this->data_formacao,
            'caducidade' => $this->caducidade,
            //'id_ccusto' => $this->id_ccusto,
        ]);

        return $dataProvider;
    }
}
