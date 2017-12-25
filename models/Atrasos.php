<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%atrasos}}".
 *
 * @property integer $id_atraso
 * @property string $data_atraso
 * @property string $cia
 * @property string $num_voo
 * @property string $tipo_atraso
 * @property integer $min_imputados
 * @property string $fora_sta
 * @property integer $voo_rotacao
 * @property integer $un_pen
 * @property integer $nao_refutado
 * @property integer $min_aceites
 * @property string $observacoes
 */
class Atrasos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%atrasos}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_atraso', 'cia', 'num_voo', 'tipo_atraso', 'min_imputados', 'fora_sta', 'voo_rotacao', 'un_pen', 'nao_refutado', 'min_aceites', 'observacoes'], 'required'],
            [['data_atraso'], 'safe'],
            [['tipo_atraso', 'fora_sta'], 'string'],
            [['min_imputados', 'voo_rotacao', 'un_pen', 'nao_refutado', 'min_aceites'], 'integer'],
            [['cia', 'num_voo'], 'string', 'max' => 5],
            [['observacoes'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_atraso' => Yii::t('app', 'Id Atraso'),
            'data_atraso' => Yii::t('app', 'Data Atraso'),
            'cia' => Yii::t('app', 'Cia'),
            'num_voo' => Yii::t('app', 'Num Voo'),
            'tipo_atraso' => Yii::t('app', 'Tipo Atraso'),
            'min_imputados' => Yii::t('app', 'Min Imputados'),
            'fora_sta' => Yii::t('app', 'Fora Sta'),
            'voo_rotacao' => Yii::t('app', 'Voo Rotacao'),
            'un_pen' => Yii::t('app', 'Un Pen'),
            'nao_refutado' => Yii::t('app', 'Nao Refutado'),
            'min_aceites' => Yii::t('app', 'Min Aceites'),
            'observacoes' => Yii::t('app', 'Observacoes'),
        ];
    }
}
