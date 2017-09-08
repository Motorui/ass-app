<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contratos".
 *
 * @property integer $id_contrato
 * @property string $tipo_contrato
 *
 * @property VinculoLaboral[] $vinculoLaborals
 */
class Contratos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contratos';
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
            'id_contrato' => 'Id de Contrato',
            'tipo_contrato' => 'Tipo de Contrato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVinculoLaborals()
    {
        return $this->hasMany(VinculoLaboral::className(), ['tipo_contrato' => 'id_contrato']);
    }
}
