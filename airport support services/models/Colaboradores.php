<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colaboradores".
 *
 * @property integer $id_colaborador
 * @property string $nome_colaborador
 * @property string $email_colaborador
 * @property string $identificao_colaborador
 * @property string $identificao_validade
 * @property string $status_colaborador
 *
 * @property Contactos[] $contactos
 * @property FormacoesColaborador[] $formacoesColaboradors
 * @property Observacoes[] $observacoes
 * @property VinculoLaboral $vinculoLaboral
 */
class Colaboradores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colaboradores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_colaborador'], 'required'],
            [['status_colaborador'], 'required'],
            [['identificao_validade'], 'safe'],
            [['status_colaborador'], 'string'],
            [['nome_colaborador', 'email_colaborador'], 'string', 'max' => 200],
            [['identificao_colaborador'], 'string', 'max' => 25],
            [['nome_colaborador'], 'unique'],
            [['email_colaborador'], 'unique'],
            [['identificao_colaborador'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_colaborador' => 'Id Colaborador',
            'nome_colaborador' => 'Nome',
            'email_colaborador' => 'Email',
            'identificao_colaborador' => 'Documento de Identificação',
            'identificao_validade' => 'Validade',
            'status_colaborador' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contactos::className(), ['id_colaborador' => 'id_colaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormacoesColaboradors()
    {
        return $this->hasMany(FormacoesColaborador::className(), ['id_colaborador' => 'id_colaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObservacoes()
    {
        return $this->hasMany(Observacoes::className(), ['id_colaborador' => 'id_colaborador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVinculoLaboral()
    {
        return $this->hasOne(VinculoLaboral::className(), ['id_colaborador' => 'id_colaborador']);
    }
}
