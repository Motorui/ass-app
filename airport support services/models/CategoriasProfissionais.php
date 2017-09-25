<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%categorias_profissionais}}".
 *
 * @property integer $id_cat_profissional
 * @property string $nome_cat_profissional
 *
 * @property Colaboradores[] $colaboradores
 */
class CategoriasProfissionais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categorias_profissionais}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_cat_profissional'], 'required'],
            [['nome_cat_profissional'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cat_profissional' => Yii::t('app', 'Id Cat Profissional'),
            'nome_cat_profissional' => Yii::t('app', 'Nome Cat Profissional'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradores()
    {
        return $this->hasMany(Colaboradores::className(), ['id_cat_profissional' => 'id_cat_profissional']);
    }
}
