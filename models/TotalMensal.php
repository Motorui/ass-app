<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%total_mensal}}".
 *
 * @property integer $id_total_mensal
 * @property integer $ano
 * @property integer $janeiro
 * @property integer $fevereiro
 * @property integer $marco
 * @property integer $abril
 * @property integer $maio
 * @property integer $junho
 * @property integer $julho
 * @property integer $agosto
 * @property integer $setembro
 * @property integer $outubro
 * @property integer $novembro
 * @property integer $dezembro
 */
class TotalMensal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%total_mensal}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ano', 'janeiro', 'fevereiro', 'marco', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'], 'required'],
            [['ano', 'janeiro', 'fevereiro', 'marco', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_total_mensal' => Yii::t('app', 'Id Total Mensal'),
            'ano' => Yii::t('app', 'Ano'),
            'janeiro' => Yii::t('app', 'Janeiro'),
            'fevereiro' => Yii::t('app', 'Fevereiro'),
            'marco' => Yii::t('app', 'Março'),
            'abril' => Yii::t('app', 'Abril'),
            'maio' => Yii::t('app', 'Maio'),
            'junho' => Yii::t('app', 'Junho'),
            'julho' => Yii::t('app', 'Julho'),
            'agosto' => Yii::t('app', 'Agosto'),
            'setembro' => Yii::t('app', 'Setembro'),
            'outubro' => Yii::t('app', 'Outubro'),
            'novembro' => Yii::t('app', 'Novembro'),
            'dezembro' => Yii::t('app', 'Dezembro'),
        ];
    }
}
