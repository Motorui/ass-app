<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%colaboradores}}".
 *
 * @property integer $id_colaborador
 * @property string $nome_colaborador
 * @property string $nascimento_colaborador
 * @property string $morada_colaborador
 * @property string $email_colaborador
 * @property string $identificao_colaborador
 * @property string $status_colaborador
 * @property integer $num_pw
 * @property integer $num_cartao
 * @property string $validade_cartao
 * @property integer $id_contrato
 * @property string $inicio_contrato
 * @property string $fim_contrato
 * @property integer $id_carga_horaria
 * @property integer $id_ccusto
 * @property integer $id_cat_profissional
 * @property integer $id_funcao
 * @property integer $id_avenca
 *
 * @property Contratos $idContrato
 * @property CargaHoraria $idCargaHoraria
 * @property CentrosCusto $idCcusto
 * @property Avencas $idAvenca
 * @property CategoriasProfissionais $idCatProfissional
 * @property Funcoes $idFuncao
 * @property Contactos[] $contactos
 * @property FormacoesColaborador[] $formacoesColaboradors
 * @property Observacoes[] $observacoes
 */
class Colaboradores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%colaboradores}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_colaborador', 'nome_colaborador'], 'required'],
            [['id_colaborador', 'num_pw', 'num_cartao', 'id_contrato', 'id_carga_horaria', 'id_ccusto', 'id_cat_profissional', 'id_funcao', 'id_avenca'], 'integer'],
            [['nascimento_colaborador', 'validade_cartao', 'inicio_contrato', 'fim_contrato'], 'safe'],
            [['status_colaborador'], 'string'],
            [['nome_colaborador', 'email_colaborador'], 'string', 'max' => 200],
            [['morada_colaborador'], 'string', 'max' => 255],
            [['identificao_colaborador'], 'string', 'max' => 25],
            [['id_contrato'], 'exist', 'skipOnError' => true, 'targetClass' => Contratos::className(), 'targetAttribute' => ['id_contrato' => 'id_contrato']],
            [['id_carga_horaria'], 'exist', 'skipOnError' => true, 'targetClass' => CargaHoraria::className(), 'targetAttribute' => ['id_carga_horaria' => 'id_carga_horaria']],
            [['id_ccusto'], 'exist', 'skipOnError' => true, 'targetClass' => CentrosCusto::className(), 'targetAttribute' => ['id_ccusto' => 'id_ccusto']],
            [['id_avenca'], 'exist', 'skipOnError' => true, 'targetClass' => Avencas::className(), 'targetAttribute' => ['id_avenca' => 'id_avenca']],
            [['id_cat_profissional'], 'exist', 'skipOnError' => true, 'targetClass' => CategoriasProfissionais::className(), 'targetAttribute' => ['id_cat_profissional' => 'id_cat_profissional']],
            [['id_funcao'], 'exist', 'skipOnError' => true, 'targetClass' => Funcoes::className(), 'targetAttribute' => ['id_funcao' => 'id_funcao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_colaborador' => Yii::t('app', 'Id:'),
            'nome_colaborador' => Yii::t('app', 'Nome:'),
            'nascimento_colaborador' => Yii::t('app', 'Data de nascimento:'),
            'morada_colaborador' => Yii::t('app', 'Morada:'),
            'email_colaborador' => Yii::t('app', 'Email:'),
            'identificao_colaborador' => Yii::t('app', 'Doc. Identificação:'),
            'status_colaborador' => Yii::t('app', 'Status:'),
            'num_pw' => Yii::t('app', 'Núm. portway:'),
            'num_cartao' => Yii::t('app', 'Núm. Cartão:'),
            'validade_cartao' => Yii::t('app', 'Validade Cartão:'),
            'id_contrato' => Yii::t('app', 'Tipo de contrato:'),
            'inicio_contrato' => Yii::t('app', 'Data de inicio:'),
            'fim_contrato' => Yii::t('app', 'Data de fim:'),
            'id_carga_horaria' => Yii::t('app', 'Carga horaria:'),
            'id_ccusto' => Yii::t('app', 'Centro de custo:'),
            'id_cat_profissional' => Yii::t('app', 'Cat. profissional:'),
            'id_funcao' => Yii::t('app', 'Função:'),
            'id_avenca' => Yii::t('app', 'Avença:'),
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCatProfissional()
    {
        return $this->hasOne(CategoriasProfissionais::className(), ['id_cat_profissional' => 'id_cat_profissional']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFuncao()
    {
        return $this->hasOne(Funcoes::className(), ['id_funcao' => 'id_funcao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contactos::className(), ['id_colaborador' => 'id_colaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormacoesColaboradors()
    {
        return $this->hasMany(FormacoesColaborador::className(), ['id_colaborador' => 'id_colaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObservacoes()
    {
        return $this->hasMany(Observacoes::className(), ['id_colaborador' => 'id_colaborador']);
    }
}
