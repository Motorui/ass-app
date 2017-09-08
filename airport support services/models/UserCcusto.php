<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_ccusto".
 *
 * @property integer $id_user_ccusto
 * @property integer $id_user
 * @property integer $id_ccusto
 *
 * @property CentrosCusto $idCcusto
 * @property User $idUser
 */
class UserCcusto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_ccusto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_ccusto'], 'required'],
            [['id_user', 'id_ccusto'], 'integer'],
            [['id_ccusto'], 'exist', 'skipOnError' => true, 'targetClass' => CentrosCusto::className(), 'targetAttribute' => ['id_ccusto' => 'id_ccusto']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user_ccusto' => Yii::t('app', 'Id'),
            'id_user' => Yii::t('app', 'User'),
            'id_ccusto' => Yii::t('app', 'Centro de custo'),
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
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCcusto()
    {
        return $this->hasMany(CentrosCusto::className(), ['id_ccusto' => 'id_ccusto']);
    }
    
}
