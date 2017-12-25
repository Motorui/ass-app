<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atrasos;
use kartik\daterange\DateRangeBehavior;

/**
 * AtrasosSearch represents the model behind the search form about `app\models\Atrasos`.
 */
class AtrasosSearch extends Atrasos
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
            [['id_atraso', 'min_imputados', 'voo_rotacao', 'un_pen', 'nao_refutado', 'min_aceites'], 'integer'],
            [['data_atraso', 'cia', 'num_voo', 'tipo_atraso', 'fora_sta', 'observacoes'], 'safe'],
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
        $query = Atrasos::find();

        // add conditions that should always apply here
        $pagination = Utility::getPagination($params);

        $dataProvider = new ActiveDataProvider([
          'pagination' => $pagination,
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
            'id_atraso' => $this->id_atraso,
            'data_atraso' => $this->data_atraso,
            'min_imputados' => $this->min_imputados,
            'voo_rotacao' => $this->voo_rotacao,
            'un_pen' => $this->un_pen,
            'nao_refutado' => $this->nao_refutado,
            'min_aceites' => $this->min_aceites,
        ]);

        $query->andFilterWhere(['like', 'cia', $this->cia])
            ->andFilterWhere(['like', 'num_voo', $this->num_voo])
            ->andFilterWhere(['like', 'tipo_atraso', $this->tipo_atraso])
            ->andFilterWhere(['like', 'fora_sta', $this->fora_sta])
            ->andFilterWhere(['like', 'observacoes', $this->observacoes]);
        $query->andFilterWhere(['between', 'data_atraso', $this->dateStart, $this->dateEnd]);

        return $dataProvider;
    }
}
