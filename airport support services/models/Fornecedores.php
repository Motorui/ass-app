<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedores".
 *
 * @property integer $id_fornecedor
 * @property string $nome_fornecedor
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
            [['nome_fornecedor'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fornecedor' => Yii::t('app', 'Id'),
            'nome_fornecedor' => Yii::t('app', 'Fornecedor'),
        ];
    }
}
