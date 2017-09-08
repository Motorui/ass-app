<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

use app\controllers\ChartsController;
use miloschuman\highcharts\SeriesDataHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResumoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Resumos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumo-index">
    <div class="well">
        <?php
            $Values = ChartsController::getResumoMesValues();
            $keys = ChartsController::getResumoMesKeys();

            $total_total = (int)$Values['total_total'];
            $total_chegadas = (int)$Values['total_chegadas'];
            $total_partidas = (int)$Values['total_partidas'];
            $total_36h = (int)$Values['total_36h'];
            $chegadas_36h = (int)$Values['chegadas_36h'];
            $partidas_36h = (int)$Values['partidas_36h'];
            $total_90m_36h = (int)$Values['total_90m_36h'];
            $chegadas_90m_36h = (int)$Values['chegadas_90m_36h'];
            $partidas_90m_36h = (int)$Values['partidas_90m_36h'];
            $total_90m = (int)$Values['total_90m'];
            $chegadas_90m = (int)$Values['chegadas_90m'];
            $partidas_90m = (int)$Values['partidas_90m'];

            echo '<pre>';
            echo print_r(ArrayHelper::getValue($Values, 'total_total'));

            echo '<p>';
            echo print_r($Values['total_total']);
            echo '</p>';

            echo '</pre>';

        ?>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Resumo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'resumo_id',
            'resumo_mes',
            'total_total',
            'total_chegadas',
            'total_partidas',
            'total_36h',
            //'chegadas_36h',
            //'partidas_36h',
            'total_90m_36h',
            //'chegadas_90m_36h',
            //'partidas_90m_36h',
            'total_90m',
            //'chegadas_90m',
            //'partidas_90m',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>

    <div class="well">
    <?php

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-dark',
    ],
    'options' => [
    'plotOptions'=> [
        'column'=> [
            'colorByPoint'=> true
        ]
    ],
    'colors'=> [
        '#FF9033',
        '#E0FF33',
        '#FF3333',
        '#A8FF33',
        '#33FFFF',
        '#BE33FF',
        '#33FF4F',
        '#FF3355',
        '#C7FF33',
        '#3396FF',
        '#FF33DD',
        '#3F33FF'
    ],
        'title' => [
            'text' => 'Assistencias',
        ],
        'xAxis' => [
            'categories' => ['total_total', 'total_chegadas', 'total_partidas', 'total_36h', 'chegadas_36h', 'partidas_36h', 'total_90m_36h', 'chegadas_90m_36h', 'partidas_90m_36h', 'total_90m', 'chegadas_90m', 'partidas_90m'],
        ],
        'labels' => [
            'items' => [
                [
                    'html' => 'Totais',
                        'style' => [
                            'left' => '50px',
                            'top' => '18px',
                            'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'column',
                
                'name' => 'Resumo',
                'data' => [$total_total, $total_chegadas, $total_partidas, $total_36h, $chegadas_36h, $partidas_36h, $total_90m_36h, $chegadas_90m_36h, $partidas_90m_36h, $total_90m, $chegadas_90m, $partidas_90m],
            ],
            


        ],
    ]
]);

    ?>
    </div>

</div>
