<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carga_horaria".
 *
 * @property integer $id_carga_horaria
 * @property string $desc_carga_horaria
 * @property integer $horas_carga_horaria
 *
 * @property Colaboradores[] $colaboradores
 */
class CargaHoraria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carga_horaria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_carga_horaria', 'horas_carga_horaria'], 'required'],
            [['horas_carga_horaria'], 'integer'],
            [['desc_carga_horaria'], 'string', 'max' => 100],
            [['desc_carga_horaria'], 'unique'],
            [['horas_carga_horaria'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_carga_horaria' => Yii::t('app', 'Id Carga Horaria'),
            'desc_carga_horaria' => Yii::t('app', 'Desc Carga Horaria'),
            'horas_carga_horaria' => Yii::t('app', 'Horas Carga Horaria'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradores()
    {
        return $this->hasMany(Colaboradores::className(), ['id_carga_horaria' => 'id_carga_horaria']);
    }
}
