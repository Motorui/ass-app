<?php

namespace app\views\faturas;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use kartik\daterange\DateRangePicker;

use app\models\Fornecedores;
use app\models\Faturas;
use app\models\CentrosCusto;
use app\models\searches\FaturasSearch;

class faturasHelper
{

  public static function input_id_ccusto($id_ccusto){
    if (!$id_ccusto) {
        return $input_id_ccusto = [
            'attribute' => 'id_ccusto',
            'value' => 'idCcusto.nome_ccusto',
            'filter'=>ArrayHelper::map(CentrosCusto::find()->asArray()->all(), 'id_ccusto', 'nome_ccusto'),
            'format'=>'text',
        ];

    }else{
        return $input_id_ccusto = [
            'attribute' => 'id_ccusto',
            'value' => 'idCcusto.nome_ccusto',
            'filter'=> false,
            'format'=>'text',
            'visible'=>false,
        ];
    }

  }
  public static function nome_ccusto($id_ccusto){
    if (!$id_ccusto) {
        return $nome_ccusto = 'Total';
    }else{
        $ccusto = CentrosCusto::findOne(['id_ccusto' => $id_ccusto]);
        return $nome_ccusto = $ccusto->nome_ccusto;
    }
  }

  public static function content($id_ccusto){
    if (!$id_ccusto) {
        return $content = (
                  Html::a('<i class="glyphicon glyphicon-plus"></i>',
                      ['faturas/create'],
                      ['class' => 'btn btn-success'])
                  .' '.
                  Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], [
                      'class' => 'btn btn-default',
                      'title' => Yii::t('kvgrid', 'Limpar')
                  ])
                );
    }else{
      return $content = (
                Html::a('<i class="glyphicon glyphicon-plus"></i>',
                    ['faturas/create', 'id_ccusto' => $id_ccusto],
                    ['class' => 'btn btn-success'])
                .' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>',
                    ['faturas/index', 'id_ccusto' => $id_ccusto],
                    ['class' => 'btn btn-default',
                    'title' => Yii::t('kvgrid', 'Limpar')
                ])
            );
        }
  }

  public static function gridColumns($input_id_ccusto){
    $searchModel = new FaturasSearch();

    $gridColumns  = [
            $input_id_ccusto,
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
            'format' => 'currency',
            'filter'=>'',
            'width'=>'150px',
            'hAlign'=>'right',
            'pageSummary'=>true,
            'pageSummaryFunc' => GridView::F_SUM,
        ],

        [
            'class' => 'kartik\grid\ActionColumn',

        ],
    ];
    return $gridColumns;
  }

}
?>
