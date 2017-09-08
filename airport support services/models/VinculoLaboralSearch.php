<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VinculoLaboral;

/**
 * VinculoLaboralSearch represents the model behind the search form about `app\models\VinculoLaboral`.
 */
class VinculoLaboralSearch extends VinculoLaboral
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vinculo', 'id_colaborador', 'num_pw', 'num_cartao', 'id_contrato', 'id_carga_horaria', 'id_ccusto', 'id_avenca'], 'integer'],
            [['validade_cartao', 'inicio_contrato', 'fim_contrato'], 'safe'],
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
        $query = VinculoLaboral::find();

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
            'id_vinculo' => $this->id_vinculo,
            'id_colaborador' => $this->id_colaborador,
            'num_pw' => $this->num_pw,
            'num_cartao' => $this->num_cartao,
            'validade_cartao' => $this->validade_cartao,
            'id_contrato' => $this->id_contrato,
            'inicio_contrato' => $this->inicio_contrato,
            'fim_contrato' => $this->fim_contrato,
            'id_carga_horaria' => $this->id_carga_horaria,
            'id_ccusto' => $this->id_ccusto,
            'id_avenca' => $this->id_avenca,
        ]);

        return $dataProvider;
    }
}
