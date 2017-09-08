<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contactos;

/**
 * ContactosSearch represents the model behind the search form about `app\models\Contactos`.
 */
class ContactosSearch extends Contactos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contacto', 'contacto'], 'integer'],
            [['id_contacto', 'id_colaborador', 'contacto'], 'safe'],
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
        $query = Contactos::find();

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

        $query->joinWith('idColaborador');

        // grid filtering conditions
        $query->andFilterWhere(['like', 'id_contacto', $this->id_contacto])
            ->andFilterWhere(['like', 'contacto', $this->contacto])
            ->andFilterWhere(['like', 'colaboradores.nome_colaborador', $this->id_colaborador]);

        return $dataProvider;
    }
}