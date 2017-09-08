<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parques".
 *
 * @property integer $id_parque
 * @property string $parque
 *
 * @property Avencas[] $avencas
 */
class Parques extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parques';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parque'], 'required'],
            [['parque'], 'string', 'max' => 25],
            [['parque'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_parque' => 'Id Parque',
            'parque' => 'Parque',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvencas()
    {
        return $this->hasMany(Avencas::className(), ['id_parque' => 'id_parque']);
    }
}
