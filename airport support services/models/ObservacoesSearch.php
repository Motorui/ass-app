<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Observacoes;

/**
 * ObservacoesSearch represents the model behind the search form about `app\models\Observacoes`.
 */
class ObservacoesSearch extends Observacoes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_observacao', 'id_colaborador'], 'integer'],
            [['titulo_observacao', 'observacao', 'data_observacao'], 'safe'],
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
        $query = Observacoes::find();

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
            'id_observacao' => $this->id_observacao,
            'id_colaborador' => $this->id_colaborador,
            'data_observacao' => $this->data_observacao,
        ]);

        $query->andFilterWhere(['like', 'titulo_observacao', $this->titulo_observacao])
            ->andFilterWhere(['like', 'observacao', $this->observacao]);

        return $dataProvider;
    }
}
