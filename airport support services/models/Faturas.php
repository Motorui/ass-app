<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%faturas}}".
 *
 * @property integer $id_fatura
 * @property integer $id_ccusto
 * @property string $tipo_fatura
 * @property string $data_fatura
 * @property integer $id_fornecedor
 * @property string $num_fatura
 * @property string $valor_fatura
 *
 * @property CentrosCusto $idCcusto
 * @property Fornecedores $idFornecedor
 */
class Faturas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faturas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ccusto', 'data_fatura', 'id_fornecedor', 'num_fatura', 'valor_fatura', 'tipo_fatura'], 'required'],
            [['id_ccusto', 'id_fornecedor'], 'integer'],
            [['tipo_fatura'], 'string'],
            [['data_fatura'], 'safe'],
            [['valor_fatura'], 'number'],
            [['num_fatura'], 'string', 'max' => 100],
            [['num_fatura'], 'unique'],
            [['id_ccusto'], 'exist', 'skipOnError' => true, 'targetClass' => CentrosCusto::className(), 'targetAttribute' => ['id_ccusto' => 'id_ccusto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fatura' => Yii::t('app', 'Id'),
            'id_ccusto' => Yii::t('app', 'Centro de Custo'),
            'tipo_fatura' => Yii::t('app', 'Tipo'),
            'data_fatura' => Yii::t('app', 'Data'),
            'id_fornecedor' => Yii::t('app', 'Fornecedor'),
            'num_fatura' => Yii::t('app', 'Número'),
            'valor_fatura' => Yii::t('app', 'Valor'),
        ];
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
    public function getIdFornecedor()
    {
        return $this->hasOne(Fornecedores::className(), ['id_fornecedor' => 'id_fornecedor']);
    }

    public function beforeSave($insert)
    {
    if (!parent::beforeSave($insert)) {
        return false;
    }
        $tipo = $this->tipo_fatura;

        if ('Nota de Crédito' == $tipo) {

            //$this->valor_fatura = 135.00;

            $this->valor_fatura = $this->valor_fatura < 0 ? $this->valor_fatura : -$this->valor_fatura ;

        } else if ('Fatura'== $tipo) {

            $this->valor_fatura = $this->valor_fatura > 0 ? $this->valor_fatura : abs($this->valor_fatura) ;
          
        } else {

        }

        // echo '<pre>';
        // print_r($this);
        // echo '</pre>';
        // exit();
        
    return true;
    }
}
