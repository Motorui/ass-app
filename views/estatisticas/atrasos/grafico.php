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

$this->title = Yii::t('app', 'Atrasos:');
$this->params['breadcrumbs'][] = $this->title;

if (!isset($ano)) {
    $ano = date("Y");
}

$series = ChartsController::getAtrasos('column', '26.42', $ano);
  // echo '<p>';
  // echo print_r($series);
  // echo '</p>';
?>
<div class="atrasos-grafico">
    <?php
$years = array_combine(range(date("Y"), 2010), range(date("Y"), 2010));

    // echo $this->render('_search', ['model' => $searchModel]); ?>
  <?= Html::beginForm() ?>
  <?= Html::dropDownList(
    'test',
    'ano',
    $years,
    ['onchange'=>'this.form.submit()']
  )?>
  <?= Html::endForm() ?>
  <div class="well">
<?php
    echo Highcharts::widget([
        'scripts' => [
            'modules/exporting',
            'themes/gray',
        ],
        'options' => [
            'credits' => ['enabled' => false],
            'type'=> 'column',
            'plotOptions'=> [
                'column'=> [
                    'dataLabels'=> [
                        'enabled'=> true,
                        'format'=> '{y} €',
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
                'text' => 'Valor de penalizações Mensal:',
            ],
            'subtitle'=> [
                'text'=> 'dados da MyWay - LIS'
            ],
            'yAxis'=>  [
                'min'=> 0,
                'title'=> [
                    'text'=> 'Valor em €'
                ],
                'labels'=> [
                    'format'=> '{value}',
                    'formatter' => new JsExpression('function(){  return this.value + " €"; }'),
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
            'series' => $series,
            'exporting'=> [
                'sourceWidth'=> 1280,
                'sourceHeight'=> 720,
                'filename'=> 'Valor de penalizações Mensal '.$ano,
            ],
        ]
    ]);
?>
  </div>

    <div class="clearfix"></div>
</div>
