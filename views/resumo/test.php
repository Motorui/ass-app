<?php
use yii\helpers\Html;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
?>

<div class="well">
<?php

    $data = $dataProvider->getModels();

    $series = array();

    $categories = array_keys($data[0]);
    array_shift($categories);

foreach($data as $key => $values) {
    $series[$key]['type'] = 'line';
    $series[$key]['name'] = $values['resumo_mes'];
    unset($values['resumo_mes']);
    $series[$key]['data'] = array_map('intval', array_values($values));
}

    echo "<p><pre>";

    print_r($series);

    echo "</pre></p>";

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
                'text' => 'chart',
            ],
            'xAxis' => [
                'categories' => $categories,
            ],
            'labels' => [
                'items' => [
                    [
                        'html' => 'Total',
                        'style' => [
                            'left' => '50px',
                            'top' => '18px',
                            'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                        ],
                    ],
                ],
            ],
            'series' => $series
        ]
    ]);

    echo Highcharts::widget([
    'options' => [
      'credits' => ['enabled' => false],
        'title' => ['text' => 'Sample title - pie chart'],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'Elements',
                'data' => [
                    ['Firefox', 45.0],
                    ['IE', 26.8],
                    ['Safari', 8.5],
                    ['Opera', 6.2],
                    ['Others', 0.7]
                ],
            ] // new closing bracket
        ],
    ],
]);

?>
</div>
