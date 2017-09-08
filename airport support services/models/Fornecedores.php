<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedores".
 *
 * @property integer $id_fornecedor
 * @property string $nome_fornecedor
 * @property string $morada_fornecedor
 * @property integer $contribuinte_fornecedor
 * @property string $status_fornecedor
 * @property string $data_criacao_fornecedor
 * @property string $data_alteracao_fornecedor
 * @property integer $user_id
 *
 * @property User $user
 */
class Fornecedores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fornecedores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_fornecedor'], 'required'],
            [['contribuinte_fornecedor', 'user_id'], 'integer'],
            [['status_fornecedor'], 'string'],
            [['data_criacao_fornecedor', 'data_alteracao_fornecedor'], 'safe'],
            [['nome_fornecedor'], 'string', 'max' => 150],
            [['morada_fornecedor'], 'string', 'max' => 250],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fornecedor' => Yii::t('app', 'Id Fornecedor'),
            'nome_fornecedor' => Yii::t('app', 'Nome:'),
            'morada_fornecedor' => Yii::t('app', 'Morada:'),
            'contribuinte_fornecedor' => Yii::t('app', 'Contribuinte:'),
            'status_fornecedor' => Yii::t('app', 'Status:'),
            'data_criacao_fornecedor' => Yii::t('app', 'Data de criação:'),
            'data_alteracao_fornecedor' => Yii::t('app', 'Data de alteração:'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
