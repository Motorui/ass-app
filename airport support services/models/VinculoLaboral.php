<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vinculo_laboral".
 *
 * @property integer $id_vinculo
 * @property integer $id_colaborador
 * @property integer $num_pw
 * @property integer $num_cartao
 * @property string $validade_cartao
 * @property integer $id_contrato
 * @property string $inicio_contrato
 * @property string $fim_contrato
 * @property integer $id_carga_horaria
 * @property integer $id_ccusto
 * @property integer $id_avenca
 *
 * @property Colaboradores $idColaborador
 * @property Contratos $idContrato
 * @property CargaHoraria $idCargaHoraria
 * @property CentrosCusto $idCcusto
 * @property Avencas $idAvenca
 */
class VinculoLaboral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vinculo_laboral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_colaborador', 'num_pw', 'num_cartao', 'id_contrato', 'id_carga_horaria', 'id_ccusto', 'validade_cartao', 'inicio_contrato'], 'required'],
            [['id_colaborador', 'num_pw', 'num_cartao', 'id_contrato', 'id_carga_horaria', 'id_ccusto', 'id_avenca'], 'integer'],
            [['validade_cartao', 'inicio_contrato', 'fim_contrato'], 'safe'],
            [['id_colaborador'], 'unique'],
            [['num_pw'], 'unique'],
            [['num_cartao'], 'unique'],
            [['id_colaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaboradores::className(), 'targetAttribute' => ['id_colaborador' => 'id_colaborador']],
            [['id_contrato'], 'exist', 'skipOnError' => true, 'targetClass' => Contratos::className(), 'targetAttribute' => ['id_contrato' => 'id_contrato']],
            [['id_carga_horaria'], 'exist', 'skipOnError' => true, 'targetClass' => CargaHoraria::className(), 'targetAttribute' => ['id_carga_horaria' => 'id_carga_horaria']],
            [['id_ccusto'], 'exist', 'skipOnError' => true, 'targetClass' => CentrosCusto::className(), 'targetAttribute' => ['id_ccusto' => 'id_ccusto']],
            [['id_avenca'], 'exist', 'skipOnError' => true, 'targetClass' => Avencas::className(), 'targetAttribute' => ['id_avenca' => 'id_avenca']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_vinculo' => 'Id Vinculo',
            'id_colaborador' => 'Colaborador',
            'num_pw' => 'Número portWay',
            'num_cartao' => 'Número Cartão',
            'validade_cartao' => 'Validade Cartão',
            'id_contrato' => 'Tipo de Contrato',
            'inicio_contrato' => 'Data de início de Contrato',
            'fim_contrato' => 'Data de Fim de Contrato',
            'id_carga_horaria' => 'Carga Horaria',
            'id_ccusto' => 'Centro de Custo',
            'id_avenca' => 'Avenca',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdColaborador()
    {
        return $this->hasOne(Colaboradores::className(), ['id_colaborador' => 'id_colaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdContrato()
    {
        return $this->hasOne(Contratos::className(), ['id_contrato' => 'id_contrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCargaHoraria()
    {
        return $this->hasOne(CargaHoraria::className(), ['id_carga_horaria' => 'id_carga_horaria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCcusto()
    {
        return $this->hasOne(CentrosCusto::className(), ['id_ccusto' => 'id_ccusto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAvenca()
    {
        return $this->hasOne(Avencas::className(), ['id_avenca' => 'id_avenca']);
    }
}
