<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resumo".
 *
 * @property integer $resumo_id
 * @property string $resumo_mes
 * @property integer $total_total
 * @property integer $total_chegadas
 * @property integer $total_partidas
 * @property integer $total_36h
 * @property integer $chegadas_36h
 * @property integer $partidas_36h
 * @property integer $total_90m_36h
 * @property integer $chegadas_90m_36h
 * @property integer $partidas_90m_36h
 * @property integer $total_90m
 * @property integer $chegadas_90m
 * @property integer $partidas_90m
 */
class Resumo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resumo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resumo_mes', 'total_total', 'total_chegadas', 'total_partidas', 'total_36h', 'chegadas_36h', 'partidas_36h', 'total_90m_36h', 'chegadas_90m_36h', 'partidas_90m_36h', 'total_90m', 'chegadas_90m', 'partidas_90m'], 'required'],
            [['resumo_mes'], 'safe'],
            [['total_total', 'total_chegadas', 'total_partidas', 'total_36h', 'chegadas_36h', 'partidas_36h', 'total_90m_36h', 'chegadas_90m_36h', 'partidas_90m_36h', 'total_90m', 'chegadas_90m', 'partidas_90m'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resumo_id' => Yii::t('app', 'Resumo ID'),
            'resumo_mes' => Yii::t('app', 'Resumo Mes'),
            'total_total' => Yii::t('app', 'Total Total'),
            'total_chegadas' => Yii::t('app', 'Total Chegadas'),
            'total_partidas' => Yii::t('app', 'Total Partidas'),
            'total_36h' => Yii::t('app', 'Total 36h'),
            'chegadas_36h' => Yii::t('app', 'Chegadas 36h'),
            'partidas_36h' => Yii::t('app', 'Partidas 36h'),
            'total_90m_36h' => Yii::t('app', 'Total 90m 36h'),
            'chegadas_90m_36h' => Yii::t('app', 'Chegadas 90m 36h'),
            'partidas_90m_36h' => Yii::t('app', 'Partidas 90m 36h'),
            'total_90m' => Yii::t('app', 'Total 90m'),
            'chegadas_90m' => Yii::t('app', 'Chegadas 90m'),
            'partidas_90m' => Yii::t('app', 'Partidas 90m'),
        ];
    }
}
