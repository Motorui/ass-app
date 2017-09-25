<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%contratos}}".
 *
 * @property integer $id_contrato
 * @property string $tipo_contrato
 *
 * @property Colaboradores[] $colaboradores
 */
class Contratos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contratos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_contrato'], 'required'],
            [['tipo_contrato'], 'string', 'max' => 100],
            [['tipo_contrato'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contrato' => Yii::t('app', 'Id Contrato'),
            'tipo_contrato' => Yii::t('app', 'Tipo Contrato'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradores()
    {
        return $this->hasMany(Colaboradores::className(), ['id_contrato' => 'id_contrato']);
    }
}
