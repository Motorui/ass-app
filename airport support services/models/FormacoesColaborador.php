<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formacoes_colaborador".
 *
 * @property integer $id_fc
 * @property integer $id_formacao
 * @property integer $id_colaborador
 * @property string $data_formacao
 * @property string $caducidade
 *
 * @property Formacoes $idFormacao
 * @property Colaboradores $idColaborador
 */
class FormacoesColaborador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formacoes_colaborador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_formacao', 'id_colaborador', 'data_formacao', 'caducidade'], 'required'],
            [['id_formacao', 'id_colaborador'], 'integer'],
            [['data_formacao', 'caducidade'], 'safe'],
            [['id_formacao'], 'exist', 'skipOnError' => true, 'targetClass' => Formacoes::className(), 'targetAttribute' => ['id_formacao' => 'id_formacao']],
            [['id_colaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaboradores::className(), 'targetAttribute' => ['id_colaborador' => 'id_colaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fc' => 'Id Fc',
            'id_formacao' => 'Id Formacao',
            'id_colaborador' => 'Id Colaborador',
            'data_formacao' => 'Data Formacao',
            'caducidade' => 'Caducidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFormacao()
    {
        return $this->hasOne(Formacoes::className(), ['id_formacao' => 'id_formacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdColaborador()
    {
        return $this->hasOne(Colaboradores::className(), ['id_colaborador' => 'id_colaborador']);
    }
}
