<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserCcusto;

/**
 * UserCcustoSearch represents the model behind the search form about `app\models\UserCcusto`.
 */
class UserCcustoSearch extends UserCcusto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user_ccusto', 'id_user', 'id_ccusto'], 'integer'],
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
        $query = UserCcusto::find();

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
            'id_user_ccusto' => $this->id_user_ccusto,
            'id_user' => $this->id_user,
            'id_ccusto' => $this->id_ccusto,
        ]);

        return $dataProvider;
    }
}
