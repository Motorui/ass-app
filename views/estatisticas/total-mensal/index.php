<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

use app\controllers\ChartsController;
use miloschuman\highcharts\SeriesDataHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searches\TotalMensalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Totais Mensais:');
$this->params['breadcrumbs'][] = $this->title;

if (!isset($ano)) {
$ano = date("Y");
}
?>
<div class="total-mensal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
  <div class="well">
    <?php

echo Highcharts::widget([
  'scripts' => [
      'modules/exporting',
      'themes/gray',
  ],
  'options' => [
    'credits' => ['enabled' => false],
  'plotOptions'=> [
      'spline'=> [
          'dataLabels'=> [
              'enabled'=> true,
              'color'=> '#FFFFFF',
          ],
          'colorByPoint'=> false,
          'pointPadding'=> 0.2,
          'borderWidth'=> 0
      ]
  ],
        'tooltip'=> [
          'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
          'pointFormat'=> '<tr><td style="color:{series.color};padding:0">{series.name}:
            </td><td style="padding:0"><b>{point.y}</b></td></tr>',
          'footerFormat'=> '</table>',
          'shared'=> true,
          'useHTML'=> true
      ],
      'title' => [
          'text' => 'Número de assistencias:',
      ],
      'subtitle'=> [
            'text'=> 'dados da MyWay - LIS'
      ],
      'yAxis'=>  [
        'min'=> 0,
        'title'=> [
            'text'=> 'Total de assistençias por mês'
        ],
        'labels'=> [
        'format'=> '{value}'
        ]
      ],
      'xAxis' => [
          'categories' => [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro',
          ],
          'crosshair'=> true,
      ],
      'labels' => [

      ],
      'series' => ChartsController::getTotalMensalValues('spline'),
      'exporting'=> [
          'sourceWidth'=> 1280,
          'sourceHeight'=> 720,
          'filename'=> 'Total de assistençias por mês '.$ano,
      ],
  ]
]);

  ?>
  </div>
  <div class="clearfix"></div>
  <div class="well">
    <?php

  echo Highcharts::widget([
  'scripts' => [
      'modules/exporting',
      'themes/gray',
  ],
  'options' => [
    'credits' => ['enabled' => false],
    'type'=> 'bar',
  'plotOptions'=> [
      'bar'=> [
          'dataLabels'=> [
              'enabled'=> true,
              'color'=> '#FFFFFF',
          ],
          'colorByPoint'=> false,
          'pointPadding'=> 0.2,
          'borderWidth'=> 0
      ]
  ],
        'tooltip'=> [
          'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
          'pointFormat'=> '<tr><td style="color:{series.color};padding:0">{series.name}:
            </td><td style="padding:0"><b>{point.y:,.2f}</b></td></tr>',
          'footerFormat'=> '</table>',
          'shared'=> true,
          'useHTML'=> true
      ],
      'title' => [
          'text' => 'Número de assistencias:',
      ],
      'subtitle'=> [
            'text'=> 'dados da MyWay - LIS'
      ],
      'yAxis'=>  [
        'min'=> 0,
        'title'=> [
            'text'=> 'Total de assistençias anual'
        ],
        'labels'=> [
        'format'=> '{value}'
        ]
      ],
      'xAxis' => [
          'categories' => [
            'Total',
          ],
          'crosshair'=> true,
      ],
      'labels' => [

      ],
      'series' => ChartsController::getTotalMensalTotal('bar'),
      'exporting'=> [
          'sourceWidth'=> 1280,
          'sourceHeight'=> 720,
          'filename'=> 'Total de assistençias anual '.$ano,
      ],
  ]
  ]);

  ?>
  </div>
  <?php

    Pjax::begin();

    echo GridView::widget([
          'dataProvider' => $dataProvider,
          //'filterModel' => $searchModel,
          'columns' => [
              //['class' => 'yii\grid\SerialColumn'],

              //'id_total_mensal',
              'ano',
              'janeiro',
              'fevereiro',
              'marco',
              'abril',
              'maio',
              'junho',
              'julho',
              'agosto',
              'setembro',
              'outubro',
              'novembro',
              'dezembro',
              'Total',

              ['class' => 'yii\grid\ActionColumn'],
          ],
      ]);

      Pjax::end(); ?>

      <p class="pull-right">
          <?= Html::a(Yii::t('app', 'Criar Novo Ano'), ['create'], ['class' => 'btn btn-success']) ?>
      </p>
    <div class="clearfix"></div>
</div>
