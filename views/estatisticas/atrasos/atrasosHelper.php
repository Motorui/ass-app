<?php

namespace app\views\estatisticas\atrasos;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use kartik\daterange\DateRangePicker;

use app\models\Atrasos;
use app\models\searches\AtrasosSearch;

class atrasosHelper
{

  public static function content(){

        return $content = (
                  Html::a('<i class="glyphicon glyphicon-plus"></i>',
                      ['atrasos/create'],
                      ['class' => 'btn btn-success'])
                  .' '.
                  Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], [
                      'class' => 'btn btn-default',
                      'title' => Yii::t('kvgrid', 'Limpar')
                  ])
                );
    }

  public static function gridColumns(){
    $searchModel = new AtrasosSearch();

    $gridColumns  = [
        [
            'attribute' => 'data_atraso',
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
            'attribute' =>'cia',
            'hAlign'=>'center',
        ],
        [
            'attribute' =>'num_voo',
            'hAlign'=>'left',
        ],
        [
            'attribute' =>'tipo_atraso',
            'hAlign'=>'left',
        ],
        [
            'attribute' =>'min_imputados',
            'hAlign'=>'left',
            'pageSummary'=>true,
            'pageSummaryFunc' => GridView::F_SUM,
        ],
        [
            'attribute' =>'fora_sta',
            'label' => 'Fora do STA/STD',
            'hAlign'=>'left',
        ],
        [
            'attribute' =>'voo_rotacao',
            'label' => 'Rotação',
            'hAlign'=>'left',
        ],
        [
            'attribute' =>'min_aceites',
            'hAlign'=>'left',
            'pageSummary'=>true,
            'pageSummaryFunc' => GridView::F_SUM,
        ],
        [
            'attribute' =>'un_pen',
            'label' => 'Uni. Penalização',
            'hAlign'=>'left',
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
