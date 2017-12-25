<?php

namespace app\views\colaboradores;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use kartik\daterange\DateRangePicker;

use app\models\CentrosCusto;
use app\models\searches\ColaboradoresSearch;

class colaboradoresHelper
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
                      ['colaboradores/create'],
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
                    ['colaboradores/create', 'id_ccusto' => $id_ccusto],
                    ['class' => 'btn btn-success'])
                .' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>',
                    ['colaboradores/index', 'id_ccusto' => $id_ccusto],
                    ['class' => 'btn btn-default',
                    'title' => Yii::t('kvgrid', 'Limpar')
                ])
            );
        }
  }

  public static function gridColumns($input_id_ccusto){
    $searchModel = new ColaboradoresSearch();

    $gridColumns  = [
        //$input_id_ccusto,
        [
            'attribute' => 'num_pw',
            'value' => 'num_pw',
            'width'=>'10%',
        ],
        [
            'attribute' => 'nome_colaborador',
            'value' => 'nome_colaborador',
            'width'=>'25%',
        ],
        [
            'attribute' => 'id_funcao',
            'value' => 'idFuncao.nome_funcao',
            'width'=>'10%',
        ],
        [
            'attribute' => 'id_contrato',
            'value' => 'idContrato.tipo_contrato',
            'width'=>'15%',
        ],
        [
          'attribute' => 'fim_contrato',
          'value' => 'fim_contrato',
          'format' => 'date',
            'width'=>'21%',
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
            'attribute' => 'id_carga_horaria',
            'value' => 'idCargaHoraria.desc_carga_horaria',
            'width'=>'15%',
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'header' => Yii::t('kvgrid', 'Menu'),
        ],
    ];
    return $gridColumns;
  }

}
?>
