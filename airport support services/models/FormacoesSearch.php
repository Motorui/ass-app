<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Formacoes;

/**
 * FormacoesSearch represents the model behind the search form about `app\models\Formacoes`.
 */
class FormacoesSearch extends Formacoes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_formacao', 'validade_formacao'], 'integer'],
            [['nome_formacao', 'sigla_formacao'], 'safe'],
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
        $query = Formacoes::find();

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
            'id_formacao' => $this->id_formacao,
            'validade_formacao' => $this->validade_formacao,
        ]);

        $query->andFilterWhere(['like', 'nome_formacao', $this->nome_formacao])
            ->andFilterWhere(['like', 'sigla_formacao', $this->sigla_formacao]);

        return $dataProvider;
    }
}
