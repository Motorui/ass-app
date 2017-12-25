<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Colaboradores;
use kartik\daterange\DateRangeBehavior;

/**
 * ColaboradoresSearch represents the model behind the search form about `app\models\Colaboradores`.
 */
class ColaboradoresSearch extends Colaboradores
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
                [['id_colaborador', 'num_pw', 'num_cartao', 'id_contrato', 'id_carga_horaria', 'id_ccusto', 'id_cat_profissional', 'id_funcao', 'id_avenca'], 'integer'],
                [['nome_colaborador', 'nascimento_colaborador', 'morada_colaborador', 'email_colaborador', 'identificao_colaborador', 'status_colaborador', 'validade_cartao', 'inicio_contrato', 'fim_contrato'], 'safe'],
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
        $query = Colaboradores::find();

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
            'id_colaborador' => $this->id_colaborador,
            'nascimento_colaborador' => $this->nascimento_colaborador,
            'num_pw' => $this->num_pw,
            'num_cartao' => $this->num_cartao,
            'validade_cartao' => $this->validade_cartao,
            'id_contrato' => $this->id_contrato,
            'inicio_contrato' => $this->inicio_contrato,
            'fim_contrato' => $this->fim_contrato,
            'id_carga_horaria' => $this->id_carga_horaria,
            'id_ccusto' => $this->id_ccusto,
            'id_cat_profissional' => $this->id_cat_profissional,
            'id_funcao' => $this->id_funcao,
            'id_avenca' => $this->id_avenca,
        ]);

        $query->andFilterWhere(['like', 'nome_colaborador', $this->nome_colaborador])
            ->andFilterWhere(['like', 'morada_colaborador', $this->morada_colaborador])
            ->andFilterWhere(['like', 'email_colaborador', $this->email_colaborador])
            ->andFilterWhere(['like', 'identificao_colaborador', $this->identificao_colaborador])
            ->andFilterWhere(['like', 'status_colaborador', $this->status_colaborador]);

        $query->andFilterWhere(['between', 'fim_contrato', $this->dateStart, $this->dateEnd]);

        $dataProviderClone = clone $dataProvider;

        return $dataProviderClone;
    }
}
