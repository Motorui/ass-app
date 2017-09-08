<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Faturas;
use kartik\daterange\DateRangeBehavior;

/**
 * FaturasSearch represents the model behind the search form about `app\models\Faturas`.
 */
class FaturasSearch extends Faturas
{
    public $dateRange;
    public $dateStart;
    public $dateEnd;

    public function behaviors()
    {
        return [
            [
                'class' => DateRangeBehavior::className(),
                'attribute' => 'dateRange',
                'dateStartAttribute' => 'dateStart',
                'dateEndAttribute' => 'dateEnd',
                'dateStartFormat' => 'Y-m-d',
                'dateEndFormat' => 'Y-m-d',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fatura', 'id_ccusto', 'id_fornecedor'], 'integer'],
            [['tipo_fatura', 'data_fatura', 'num_fatura'], 'safe'],
            [['valor_fatura'], 'number'],
            [['dateRange'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
            [['dateRange'], 'safe'],
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
        $query = Faturas::find();

        // add conditions that should always apply here

        $pagination = Utility::getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_fatura' => $this->id_fatura,
            'id_ccusto' => $this->id_ccusto,
            'data_fatura' => $this->data_fatura,
            'id_fornecedor' => $this->id_fornecedor,
            'valor_fatura' => $this->valor_fatura,
        ]);

        $query->andFilterWhere(['like', 'tipo_fatura', $this->tipo_fatura])
              ->andFilterWhere(['like', 'num_fatura', $this->num_fatura]);

        $query->andFilterWhere(['between', 'data_fatura', $this->dateStart, $this->dateEnd]);

        $dataProviderClone = clone $dataProvider;

        return $dataProviderClone;
    }

}
