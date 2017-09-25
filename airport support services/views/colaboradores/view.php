<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */
$id_ccusto = Yii::$app->request->get('id_ccusto');

$this->title = $model->nome_colaborador;

if (null !==($id_ccusto)) {
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colaboradores'), 'url' => ['index', 'id_ccusto' => $id_ccusto]];
}else{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Colaboradores'), 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;

$attributes = [
    [
        'group'=>true,
        'label'=>'DADOS PESSOAIS:',
        'rowOptions'=>['class'=>'info']
    ],
    [
        'columns' => [
            [
                'attribute'=>'nome_colaborador', 
                'label'=>'Nome: ',
                'displayOnly'=>true,
                'valueColOptions'=>['style'=>'width:50%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute'=>'nascimento_colaborador', 
                'format'=>'date',
                'type'=>DetailView::INPUT_DATE,
                'widgetOptions' => [
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                'valueColOptions'=>['style'=>'width:20%'],
                'labelColOptions'=>['style'=>'width:20%']
            ]
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'morada_colaborador', 
                'label'=>'Morada: ',
                'valueColOptions'=>['style'=>'width:90%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute'=>'email_colaborador', 
                'label'=>'E-mail:',
                'valueColOptions'=>['style'=>'width:30%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute'=>'identificao_colaborador', 
                'label'=>'Documento de identificação:',
                'valueColOptions'=>['style'=>'width:10%'],
                'labelColOptions'=>['style'=>'width:20%']
            ],
            // [
            //     'attribute'=>'identificao_validade', 
            //     'label'=>'Validade:',
            //     'format'=>'date',
            //     'type'=>DetailView::INPUT_DATE,
            //     'widgetOptions' => [
            //         'pluginOptions'=>['format'=>'yyyy-mm-dd']
            //     ],
            //     'valueColOptions'=>['style'=>'width:20%'],
            //     'labelColOptions'=>['style'=>'width:10%']
            // ]            
        ],
    ],
    [
        'group'=>true,
        'label'=>'DADOS CONTRATUAIS:',
        'rowOptions'=>['class'=>'info'],
        //'groupOptions'=>['class'=>'text-center']
    ],
    [
        'columns' => [
            [
                'attribute'=>'status_colaborador', 
                'label'=>'Status:',
                'valueColOptions'=>['style'=>'width:10%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute'=>'num_pw', 
                'label'=>'Nº portway:',
                'valueColOptions'=>['style'=>'width:10%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute'=>'num_cartao', 
                'label'=>'Nº cartão:',
                'valueColOptions'=>['style'=>'width:10%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute'=>'validade_cartao', 
                'label'=>'Validade:',
                'format'=>'date',
                'type'=>DetailView::INPUT_DATE,
                'widgetOptions' => [
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                'valueColOptions'=>['style'=>'width:30%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],            
        ]
    ],
    [
        'columns' => [
            [
                'attribute'=>'id_contrato', 
                'label'=>'Contrato:',
                'value'=>$model->idContrato->tipo_contrato,
                'valueColOptions'=>['style'=>'width:15%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute'=>'inicio_contrato', 
                'label'=>'Data início:',
                'format'=>'date',
                'type'=>DetailView::INPUT_DATE,
                'widgetOptions' => [
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                'valueColOptions'=>['style'=>'width:15%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute'=>'fim_contrato', 
                'label'=>'Fim contrato (estimado):',
                'format'=>'date',
                'type'=>DetailView::INPUT_DATE,
                'widgetOptions' => [
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                'valueColOptions'=>['style'=>'width:30%'],
                'labelColOptions'=>['style'=>'width:20%']
            ],          
        ]
    ],
    [
        'columns' => [
            [
                'attribute'=>'id_carga_horaria', 
                'label'=>'Carga Horária:',
                'value'=>$model->idCargaHoraria->desc_carga_horaria,
                'valueColOptions'=>['style'=>'width:25%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute'=>'id_ccusto', 
                'label'=>'Centro de Custo:',
                'value'=>$model->idCcusto->nome_ccusto,
                'valueColOptions'=>['style'=>'width:25%'],
                'labelColOptions'=>['style'=>'width:15%']
            ],
            [
                'attribute'=>'id_avenca', 
                'label'=>'Avença:',
                'value'=>$model->idAvenca->num_avenca,
                'valueColOptions'=>['style'=>'width:15%'],
                'labelColOptions'=>['style'=>'width:10%']
            ],   
        ]
    ],
]
?>
<div class="colaboradores-view">
<?=
    DetailView::widget([
        'model' => $model,
        'panel'=>[
            'heading'=>'Colaborador número: ' . $model->num_pw,
            'type'=>DetailView::TYPE_INFO,
        ],
        'attributes' => $attributes,
        'mode'=>DetailView::MODE_VIEW,
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'hAlign'=>'left',
        'vAlign'=>'middle',
        'fadeDelay'=>0.5,
        'deleteOptions'=>[ // your ajax delete parameters
            'params' => ['id' => 1000, 'kvdelete'=>true],
        ],
        'container' => ['id'=>'detalhes-colaborador'],
        'buttons1' => '',
    ]);
?>
    <p>
        <?= Html::a(Yii::t('app', 'Atualizar'), ['update', 'id' => $model->id_colaborador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Apagar'), ['delete', 'id' => $model->id_colaborador], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Deseja apagar este colaborador?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
