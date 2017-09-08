<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avencas".
 *
 * @property integer $id_avenca
 * @property integer $id_parque
 * @property integer $num_avenca
 * @property string $data_avenca
 *
 * @property Parques $idParque
 * @property VinculoLaboral[] $vinculoLaborals
 */
class Avencas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avencas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parque', 'num_avenca', 'data_avenca'], 'required'],
            [['id_parque', 'num_avenca'], 'integer'],
            [['data_avenca'], 'safe'],
            [['id_parque'], 'unique'],
            [['num_avenca'], 'unique'],
            [['id_parque'], 'exist', 'skipOnError' => true, 'targetClass' => Parques::className(), 'targetAttribute' => ['id_parque' => 'id_parque']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_avenca' => 'Id Avenca',
            'id_parque' => 'Id Parque',
            'num_avenca' => 'Num Avenca',
            'data_avenca' => 'Data Avenca',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdParque()
    {
        return $this->hasOne(Parques::className(), ['id_parque' => 'id_parque']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVinculoLaborals()
    {
        return $this->hasMany(VinculoLaboral::className(), ['id_avenca' => 'id_avenca']);
    }
}
