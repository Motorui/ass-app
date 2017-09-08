<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "centros_custo".
 *
 * @property integer $id_ccusto
 * @property integer $num_ccusto
 * @property string $nome_ccusto
 *
 * @property VinculoLaboral[] $vinculoLaborals
 */
class CentrosCusto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'centros_custo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_ccusto', 'nome_ccusto'], 'required'],
            [['num_ccusto'], 'integer'],
            [['nome_ccusto'], 'string', 'max' => 100],
            [['nome_ccusto'], 'unique'],
            [['num_ccusto'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ccusto' => 'Id Centro de custo',
            'num_ccusto' => 'Número',
            'nome_ccusto' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVinculoLaborals()
    {
        return $this->hasMany(VinculoLaboral::className(), ['centro_custo' => 'id_ccusto']);
    }
}
