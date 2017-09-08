<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%contactos}}".
 *
 * @property integer $id_contacto
 * @property integer $id_colaborador
 * @property integer $contacto
 *
 * @property Colaboradores $idColaborador
 */
class Contactos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contactos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_colaborador', 'contacto'], 'required'],
            [['id_colaborador', 'contacto'], 'integer'],
            [['id_colaborador'], 'exist', 'skipOnError' => true, 'targetClass' => Colaboradores::className(), 'targetAttribute' => ['id_colaborador' => 'id_colaborador']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contacto' => Yii::t('app', 'Id Contacto'),
            'id_colaborador' => Yii::t('app', 'Id Colaborador'),
            'contacto' => Yii::t('app', 'Contacto'),
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
