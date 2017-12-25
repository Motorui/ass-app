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
  static function getAtrasos($type, $valor, $ano){

    Yii::$app->db2->createCommand("SET lc_time_names = 'pt_PT';")->execute();

    $query = Yii::$app->db2->createCommand ("SELECT MONTHNAME(`data_atraso`) AS `MES`,
      SUM(`un_pen`) AS `TOTAL`
      FROM atrasos WHERE YEAR(`data_atraso`) = $ano
      GROUP BY YEAR(`data_atraso`), MONTH(`data_atraso`)" )->queryAll();

      foreach($query as $key => $values) {
          $values['VALOR'] = $values['TOTAL'] * $valor;

          $series[$key]['type'] = $type;
          $series[$key]['name'] = $values['MES'];
          unset($values['MES']);
          unset($values['TOTAL']);
          $series[$key]['data'] = array_map('floatval', array_values($values));
      }

    return $series;

  }

  static function getTotalMensalTotal($type) {

      $query = Yii::$app->db2->createCommand ("SELECT `ano`, (
          `janeiro` + `fevereiro` + `marco` + `abril` + `maio` + `junho` +
           `julho` + `agosto` + `setembro` + `outubro` + `novembro` + `dezembro`
        ) AS `total` FROM `total_mensal`" )->queryAll();

        foreach($query as $key => $values) {
            $series[$key]['type'] = $type;
            $series[$key]['name'] = $values['ano'];
            unset($values['ano']);
            $series[$key]['data'] = array_map('intval', array_values($values));
        }

      return $series;
  }

  static function getTotalMensalValues($type) {

      $query = Yii::$app->db2->createCommand ("SELECT `ano`, `janeiro`, `fevereiro`,
        `marco`, `abril`, `maio`, `junho`, `julho`, `agosto`, `setembro`, `outubro`,
        `novembro`, `dezembro` FROM `total_mensal`" )->queryAll();

          foreach($query as $key => $values) {
              $series[$key]['type'] = $type;
              $series[$key]['name'] = $values['ano'];
              unset($values['ano']);
              $series[$key]['data'] = array_map('intval', array_values($values));
          }

      return $series;
  }

    static function getResumoMesValues() {

        $mes = date("Y-m-d", strtotime("first day of previous month"));

        $result = Yii::$app->db2->createCommand ("SELECT `total_total`,`total_chegadas`,`total_partidas`,`total_36h`,`chegadas_36h`,`partidas_36h`,`total_90m_36h`,`chegadas_90m_36h`,`partidas_90m_36h`,`total_90m`,`chegadas_90m`,`partidas_90m` FROM `resumo` WHERE `resumo_mes` = '$mes'" )->queryOne();


        return $result;

    }

    static function getResumoMeskeys() {

        $mes = date("Y-m-d", strtotime("first day of previous month"));

        $result = Yii::$app->db2->createCommand ("SELECT `total_total`,`total_chegadas`,`total_partidas`,`total_36h`,`chegadas_36h`,`partidas_36h`,`total_90m_36h`,`chegadas_90m_36h`,`partidas_90m_36h`,`total_90m`,`chegadas_90m`,`partidas_90m` FROM `resumo` WHERE `resumo_mes` = '$mes'" )->queryOne();

        $List = implode(', ', $result);
        return $List;
    }

}
