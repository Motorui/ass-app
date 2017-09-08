<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CargaHoraria;

/**
 * CargaHorariaSearch represents the model behind the search form about `app\models\CargaHoraria`.
 */
class CargaHorariaSearch extends CargaHoraria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_carga_horaria', 'horas_carga_horaria'], 'integer'],
            [['desc_carga_horaria'], 'safe'],
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
        $query = CargaHoraria::find();

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
            'id_carga_horaria' => $this->id_carga_horaria,
            'horas_carga_horaria' => $this->horas_carga_horaria,
        ]);

        $query->andFilterWhere(['like', 'desc_carga_horaria', $this->desc_carga_horaria]);

        return $dataProvider;
    }
}
