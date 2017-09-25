<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%funcoes}}".
 *
 * @property integer $id_funcao
 * @property string $nome_funcao
 *
 * @property Colaboradores[] $colaboradores
 */
class Funcoes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%funcoes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_funcao'], 'required'],
            [['nome_funcao'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_funcao' => Yii::t('app', 'Id Funcao'),
            'nome_funcao' => Yii::t('app', 'Nome Funcao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradores()
    {
        return $this->hasMany(Colaboradores::className(), ['id_funcao' => 'id_funcao']);
    }
}
