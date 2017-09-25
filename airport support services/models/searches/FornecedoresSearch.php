<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fornecedores;

/**
 * FornecedoresSearch represents the model behind the search form about `app\models\Fornecedores`.
 */
class FornecedoresSearch extends Fornecedores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fornecedor', 'contribuinte_fornecedor', 'user_id'], 'integer'],
            [['nome_fornecedor', 'morada_fornecedor', 'status_fornecedor', 'data_criacao_fornecedor', 'data_alteracao_fornecedor'], 'safe'],
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
        $query = Fornecedores::find();

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
            'id_fornecedor' => $this->id_fornecedor,
            'contribuinte_fornecedor' => $this->contribuinte_fornecedor,
            'data_criacao_fornecedor' => $this->data_criacao_fornecedor,
            'data_alteracao_fornecedor' => $this->data_alteracao_fornecedor,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nome_fornecedor', $this->nome_fornecedor])
            ->andFilterWhere(['like', 'morada_fornecedor', $this->morada_fornecedor])
            ->andFilterWhere(['like', 'status_fornecedor', $this->status_fornecedor]);

        return $dataProvider;
    }
}
