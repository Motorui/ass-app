<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;

use app\models\Contratos;
use app\models\CargaHoraria;
use app\models\CentrosCusto;
use app\models\Avencas;
use app\models\CategoriasProfissionais;
use app\models\Funcoes;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colaboradores-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'colaboradoresForm']); ?>

    <?= FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'contentBefore'=>'<legend class="text-info"><small>Dados Pessoais</small></legend>',
            'attributes'=>[
                'nome_colaborador'=>['type'=>Form::INPUT_TEXT,],
                'email_colaborador'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Email...']
                , 'hint'=>'E-mail (_@_._)'],
            ]
        ],
        [
            'attributes'=>[
                'morada_colaborador'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Morada...']],
            ]
        ],
        [
            'attributes'=>[
                'identificao_colaborador'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Cartão de cidadão/passaporte...']],
                //'identificao_validade'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 'hint'=>'Validade do documento (yyyy/mm/dd)'],
                'nascimento_colaborador'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 'hint'=>'Data de Nascimento (yyyy/mm/dd)'],
            ],
        ],
        [
            'contentBefore'=>'<legend class="text-info"><small>Dados contratuais</small></legend>',
            'attributes'=>[
                'status_colaborador'=>['type'=>Form::INPUT_DROPDOWN_LIST, 'items'=>[ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], 'hint'=>'Selecionar Status...'],
                'num_pw'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Email...']],
                'num_cartao'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Email...']],
                'validade_cartao'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 'hint'=>'Validade do cartão (yyyy/mm/dd)',
                'options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]],
                ],
            ],
        ],
        [
            'attributes'=>[
                'id_contrato'=>['type'=>Form::INPUT_DROPDOWN_LIST,
                    'items'=>ArrayHelper::map(Contratos::find()->select(
                        ['id_contrato', 'tipo_contrato'])->all(), 'id_contrato', 'tipo_contrato'),
                            'hint'=>'Selecionar tipo de contrato...'],
                'inicio_contrato'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 'hint'=>'Data de início de contrato (yyyy/mm/dd)',
                    'options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]],
                ],
                'fim_contrato'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 'hint'=>'Data de fim de contrato (yyyy/mm/dd)',
                    'options' => ['pluginOptions' => ['format' => 'yyyy-mm-dd', 'autoclose'=>true, 'todayHighlight' => true]],
                ],
                'id_ccusto'=>['type'=>Form::INPUT_DROPDOWN_LIST, 'items'=>ArrayHelper::map(CentrosCusto::find()->select(
                    ['id_ccusto', 'nome_ccusto'])->all(), 'id_ccusto', 'nome_ccusto'), 'hint'=>'Selecionar Centro de custo...'
                ],
            ],
        ],
        [
            'attributes'=>[
                'id_carga_horaria'=>['type'=>Form::INPUT_DROPDOWN_LIST,
                    'items'=>ArrayHelper::map(CargaHoraria::find()->select(
                        ['id_carga_horaria', 'desc_carga_horaria'])->all(), 'id_carga_horaria', 'desc_carga_horaria'),
                            'hint'=>'Selecionar Carga Horária...'],
                'id_cat_profissional'=>['type'=>Form::INPUT_DROPDOWN_LIST,
                    'items'=>ArrayHelper::map(CategoriasProfissionais::find()->select(
                        ['id_cat_profissional', 'nome_cat_profissional'])->all(), 'id_cat_profissional', 'nome_cat_profissional'),
                            'hint'=>'Selecionar Categoria...'],
                'id_funcao'=>['type'=>Form::INPUT_DROPDOWN_LIST,
                    'items'=>ArrayHelper::map(Funcoes::find()->select(
                        ['id_funcao', 'nome_funcao'])->all(), 'id_funcao', 'nome_funcao'),
                            'hint'=>'Selecionar função...'],
                'id_avenca'=>['type'=>Form::INPUT_DROPDOWN_LIST,
                    'items'=>ArrayHelper::map(Avencas::find()->select(
                        ['id_avenca', 'num_avenca'])->all(), 'id_avenca', 'num_avenca'),
                            'hint'=>'Selecionar Avença...'],
            ],
        ]
    ]
]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Criar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
