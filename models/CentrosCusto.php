<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "centros_custo".
 *
 * @property integer $id_ccusto
 * @property integer $num_ccusto
 * @property string $nome_ccusto
 * @property string $created_at
 * @property string $modified_at
 * @property integer $user_id
 *
 * @property Colaboradores[] $colaboradores
 * @property Faturas[] $faturas
 * @property UserCcusto[] $userCcustos
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
            [['num_ccusto', 'user_id'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
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
            'num_ccusto' => Yii::t('app', 'Número:'),
            'nome_ccusto' => Yii::t('app', 'Nome:'),
            'created_at' => Yii::t('app', 'Criado em:'),
            'modified_at' => Yii::t('app', 'Modificado em:'),
            'user_id' => Yii::t('app', 'Criado/Modificado por:'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradores()
    {
        return $this->hasMany(Colaboradores::className(), ['id_ccusto' => 'id_ccusto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Faturas::className(), ['id_ccusto' => 'id_ccusto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCcustos()
    {
        return $this->hasMany(UserCcusto::className(), ['id_ccusto' => 'id_ccusto']);
    }

    public function getDisplayName()
    {
        return $this->num_ccusto.' - '.$this->nome_ccusto;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
