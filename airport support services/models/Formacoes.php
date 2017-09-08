<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formacoes".
 *
 * @property integer $id_formacao
 * @property string $nome_formacao
 * @property string $sigla_formacao
 * @property integer $validade_formacao
 *
 * @property FormacoesColaborador[] $formacoesColaboradors
 */
class Formacoes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formacoes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_formacao', 'sigla_formacao', 'validade_formacao'], 'required'],
            [['validade_formacao'], 'integer'],
            [['nome_formacao'], 'string', 'max' => 100],
            [['sigla_formacao'], 'string', 'max' => 10],
            [['nome_formacao'], 'unique'],
            [['sigla_formacao'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_formacao' => 'Id Formacao',
            'nome_formacao' => 'Nome',
            'sigla_formacao' => 'Sigla',
            'validade_formacao' => 'Validade (em anos)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormacoesColaboradors()
    {
        return $this->hasMany(FormacoesColaborador::className(), ['id_formacao' => 'id_formacao']);
    }
}
