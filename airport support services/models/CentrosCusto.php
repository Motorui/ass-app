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
 * @property Colaboradores[] $colaboradores
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ccusto' => Yii::t('app', 'Id'),
            'num_ccusto' => Yii::t('app', 'Número'),
            'nome_ccusto' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradores()
    {
        return $this->hasMany(Colaboradores::className(), ['id_ccusto' => 'id_ccusto']);
    }

    public function getDisplayName()
    {
        return $this->num_ccusto.' - '.$this->nome_ccusto;
    }
}
