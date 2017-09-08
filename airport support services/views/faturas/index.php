<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

use app\models\CentrosCusto;
use app\models\Fornecedores;

use kartik\grid\GridView;
use kartik\export\ExportMenu;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Faturas');
$this->params['breadcrumbs'][] = $this->title;

$valor = 0;
if (!empty($dataProvider->getModels())) {
 foreach ($dataProvider->getModels() as $key => $val) {
     $valor -= $val->valor_fatura;
    }
}

$gridColumns  = [
    [
        'attribute' => 'id_ccusto',
        'value' => 'idCcusto.nome_ccusto',
        'filter'=>ArrayHelper::map(CentrosCusto::find()->asArray()->all(), 'id_ccusto', 'nome_ccusto'),
        'format'=>'text',
    ],
    [
        'attribute' => 'tipo_fatura',
        'filter'=>array("Fatura"=>"Fatura","Nota de Crédito"=>"Nota de Crédito"),
    ],
    [
        'attribute' => 'data_fatura',
        'format' => 'date',
        'width'=>'250px',
        'hAlign'=>'right',
        'filter'=> DateRangePicker::widget([
            'model'=>$searchModel,
            'hideInput' => true,
            'useWithAddon'=>true,
            'attribute'=>'dateRange',
            'convertFormat'=>true,
            'presetDropdown'=>true,
            'pluginOptions' => [
                'opens'=>'right',
                'locale' => [
                    'cancelLabel' => 'Limpar',
                    'format' => 'd-m-Y',
                ]
            ]
        ])
    ],
    [
        'attribute' => 'id_fornecedor',
        'value' => 'idFornecedor.nome_fornecedor',
        'filter'=>ArrayHelper::map(Fornecedores::find()->asArray()->all(), 'id_fornecedor', 'nome_fornecedor'),
    ],            
    [
        'attribute' =>'num_fatura',
        'width'=>'100px',
        'hAlign'=>'right',
        'pageSummary'=>'Total'
    ],
    [
        'attribute' => 'valor_fatura',
        'value' => function ($model, $key, $index, $widget) {
            return Yii::$app->formatter->asCurrency($model->valor_fatura);
        },
        'filter'=>'',
        'width'=>'150px',
        'hAlign'=>'right',
        'pageSummary'=>Yii::$app->formatter->asCurrency($valor),
    ],

    [
        'class' => 'kartik\grid\ActionColumn',

    ],
];

$exportMenu = ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'target' => ExportMenu::TARGET_BLANK,
    'fontAwesome' => false,
    'showConfirmAlert'=>false,
    'pjaxContainerId' => 'kv-pjax-container',
    'dropdownOptions' => [
        'label' => 'Exportar',
        'class' => 'btn btn-default',
        'itemsBefore' => [
            '<li class="dropdown-header">Exporta todos os dados</li>',
        ],
    ],
    'exportConfig' => [
        ExportMenu::FORMAT_HTML => false,
        ExportMenu::FORMAT_CSV => false,
        ExportMenu::FORMAT_TEXT => false,
        ExportMenu::FORMAT_PDF => [
            //'filename' => 'TESTE',
        'contentBefore'=>['TESTE'],
        ],
        ExportMenu::FORMAT_EXCEL => [
            'cssInline'     => '.kv-wrap{padding:20px;}' .
                '.kv-align-center{text-align:center;}' .
                '.kv-align-left{text-align:left;}' .
                '.kv-align-right{text-align:right;}' .
                '.kv-align-top{vertical-align:top!important;}' .
                '.kv-align-bottom{vertical-align:bottom!important;}' .
                '.kv-align-middle{vertical-align:middle!important;}' .
                '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
            'methods'       => [
                    'SetHeader' => [
                        ['odd' => '$ourPdfHeader', 'even' => '$ourPdfHeader']
                    ],
                    'SetFooter' => [
                        ['odd' => '$ourPdfFooter', 'even' => '$ourPdfFooter']
                    ],
                ],
                'options'       => [
                    'title'    => 'Custom Title',
                    'subject'  => 'PDF export',
                    'keywords' => 'pdf'
                ],
                'contentBefore' => '',
                'contentAfter'  => ''
            ],
            ExportMenu::FORMAT_EXCEL_X => [
                'font' => [
                    'bold' => true,
                    'color' => [
                        'argb' => 'FFFFFFFF',
                    ],
                ],
                'fill' => [
                    'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'startcolor' => [
                        'argb' => 'FFA0A0A0',
                    ],
                    'endcolor' => [
                        'argb' => 'FFFFFFFF',
                    ],
                ],
                'contentBefore'=>['TESTE'],
            ],
    ],

]);
?>

<div class="faturas-index">

    <?php
        Modal::begin([
            'header' => '<h4>Adicionar Faturas</h4>',
            'id' => 'modal',
            'size' => 'modal-md',
            ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
  
    <?= GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'showPageSummary'=>true,
        'responsive'=>true,
        'hover'=>true,
        'showFooter'=>false,
        'footerRowOptions'=>['style'=>'font-weight:bold'],
        'pjax'=>false,
        'pjaxSettings'=> [
            'neverTimeout'=>true,
        ],
        'resizableColumns'=>true,
        'resizeStorageKey'=>Yii::$app->user->id . '-' . date("m"),
    'toolbar' => [
        [
            'content'=>
                Html::button('<i class="glyphicon glyphicon-plus"></i>', 
                    ['value' => Url::to('faturas/createmodal'),
                    'class' => 'btn btn-success showModalButton', 'id'=>'showModalButton',
                ])
                .' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], [
                    'class' => 'btn btn-default', 
                    'title' => Yii::t('kvgrid', 'Limpar')
                ]),
        ],
        $exportMenu,
        '{toggleData}'
    ],
        'toggleDataOptions' => [
            'all' => [
                'icon' => 'resize-full',
                'label' => Yii::t('kvgrid', 'TUDO'),
                'class' => 'btn btn-default',
                'title' => 'Mostrar todos os resultados'
            ],
            'page' => [
                'icon' => 'resize-small',
                'label' => Yii::t('kvgrid', 'Página'),
                'class' => 'btn btn-default',
                'title' => 'Mostrar apenas a primeira página'
            ],
        ],
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> '.Html::encode($this->title).'</h3>',
            'type'=>'success',
            'footer'=>false
        ],
        'rowOptions'=>function($model){
            if($model->valor_fatura < 0 ){
                return ['class' => 'success'];
            }
        },     
    ]); 
?>

</div>