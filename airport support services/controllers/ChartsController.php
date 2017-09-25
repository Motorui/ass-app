<?php

namespace app\controllers;

use Yii;
use app\models\Resumo;
use app\models\searches\ResumoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ResumoController implements the CRUD actions for Resumo model.
 */
class ChartsController extends Controller
{

    static function getResumoMesValues() {

        $mes = date("Y-m-d", strtotime("first day of previous month"));

        $result = Yii::$app->db->createCommand ("SELECT `total_total`,`total_chegadas`,`total_partidas`,`total_36h`,`chegadas_36h`,`partidas_36h`,`total_90m_36h`,`chegadas_90m_36h`,`partidas_90m_36h`,`total_90m`,`chegadas_90m`,`partidas_90m` FROM `resumo` WHERE `resumo_mes` = '$mes'" )->queryOne();


        return $result;

    }

    static function getResumoMeskeys() {

        $mes = date("Y-m-d", strtotime("first day of previous month"));

        $result = Yii::$app->db->createCommand ("SELECT `total_total`,`total_chegadas`,`total_partidas`,`total_36h`,`chegadas_36h`,`partidas_36h`,`total_90m_36h`,`chegadas_90m_36h`,`partidas_90m_36h`,`total_90m`,`chegadas_90m`,`partidas_90m` FROM `resumo` WHERE `resumo_mes` = '$mes'" )->queryOne();

        $List = implode(', ', $result);
        return $List;
    }

}
