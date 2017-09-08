<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "observacoes".
 *
 * @property integer $id_observacao
 * @property integer $id_colaborador
 * @property string $titulo_observacao
 * @property string $observacao
 *
 * @property Colaboradores $idColaborador
 */
class Observacoes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'observacoes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_colaborador', 'titulo_observacao', 'observacao'], 'required'],
            [['id_colaborador'], 'integer'],
            [['observacao'], 'string'],
            [['titulo_observacao'], 'string', 'max' => 200],
            [['id_colaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaboradores::className(), 'targetAttribute' => ['id_colaborador' => 'id_colaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_observacao' => 'Id Observacao',
            'id_colaborador' => 'Id Colaborador',
            'titulo_observacao' => 'Titulo Observacao',
            'observacao' => 'Observacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdColaborador()
    {
        return $this->hasOne(Colaboradores::className(), ['id_colaborador' => 'id_colaborador']);
    }
}
