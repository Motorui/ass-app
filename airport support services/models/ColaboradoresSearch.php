<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Colaboradores;

/**
 * ColaboradoresSearch represents the model behind the search form about `app\models\Colaboradores`.
 */
class ColaboradoresSearch extends Colaboradores
{
    /**
     * @inheritdoc
     */
    public $procuraGlobal;

    public function rules()
    {
        return [
            [['id_colaborador'], 'integer'],
            [['procuraGlobal', 'nome_colaborador', 'email_colaborador', 'identificao_colaborador', 'identificao_validade', 'status_colaborador'], 'safe'],
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
        $query = Colaboradores::find();

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

        $query->orFilterWhere(['like', 'nome_colaborador', $this->procuraGlobal])
            ->orFilterWhere(['like', 'email_colaborador', $this->procuraGlobal])
            ->orFilterWhere(['like', 'identificao_colaborador', $this->procuraGlobal])
            ->orFilterWhere(['like', 'status_colaborador', $this->procuraGlobal]);

        return $dataProvider;
    }
}
