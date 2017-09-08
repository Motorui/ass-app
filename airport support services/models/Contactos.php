<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contactos".
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
        return 'contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['contacto'], 'required'],
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
            'id_contacto' => 'Id Contacto',
            'id_colaborador' => 'Colaborador',
            'contacto' => 'Contacto',
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
