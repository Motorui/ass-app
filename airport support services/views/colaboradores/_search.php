<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\Select2;

use app\models\Contratos;
use app\models\CargaHoraria;
use app\models\CentrosCusto;
use app\models\Avencas;
use app\models\CategoriasProfissionais;
use app\models\Funcoes;

/* @var $this yii\web\View */
/* @var $model app\models\searches\ColaboradoresSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="colaboradores-search">
  <p>
    <a class="btn btn-default btn-md" data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse">
      <span class="glyphicon glyphicon-search" aria-hidden="true"> Filtros</span>
    </a>
  </p>
<div class="collapse" id="collapse">
    <?php
      $form = ActiveForm::begin(['action' => ['index'],
        'method' => 'get',
        'type'=>ActiveForm::TYPE_VERTICAL,
        'id'=>'colaboradoresSearchForm']);
    ?>
    <?= FormGrid::widget([
    'model'=>$model,
    'form'=>$form,
    'autoGenerateColumns'=>true,
    'rows'=>[
        [
            'attributes'=>[
                'num_pw'=>['type'=>Form::INPUT_TEXT,

              ],
                'nome_colaborador'=>['type'=>Form::INPUT_TEXT,
                
              ],
                'id_ccusto'=>[
                  'type'=>Form::INPUT_WIDGET,
                  'widgetClass'=>'\kartik\widgets\Select2',
                  'options'=>[
                    'data'=>ArrayHelper::map(CentrosCusto::find()->all(), 'id_ccusto', 'nome_ccusto'),
                    'options' => [
                        'placeholder' => 'Centros de Custo ...',
                    ],
                  ],

                ],
            ]
        ],

    ]
    ]); ?>
    <?php // echo $form->field($model, 'id_colaborador') ?>

    <?php // echo $form->field($model, 'nome_colaborador') ?>

    <?php // echo $form->field($model, 'nascimento_colaborador') ?>

    <?php // echo $form->field($model, 'morada_colaborador') ?>

    <?php // echo $form->field($model, 'email_colaborador') ?>

    <?php // echo $form->field($model, 'identificao_colaborador') ?>

    <?php // echo $form->field($model, 'identificao_validade') ?>

    <?php // echo $form->field($model, 'status_colaborador') ?>

    <?php // echo $form->field($model, 'num_pw') ?>

    <?php // echo $form->field($model, 'num_cartao') ?>

    <?php // echo $form->field($model, 'validade_cartao') ?>

    <?php // echo $form->field($model, 'id_contrato') ?>

    <?php // echo $form->field($model, 'inicio_contrato') ?>

    <?php // echo $form->field($model, 'fim_contrato') ?>

    <?php // echo $form->field($model, 'id_carga_horaria') ?>

    <?php // echo $form->field($model, 'idCcusto.nomeCcusto') ?>

    <?php // echo $form->field($model, 'id_avenca') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Procurar'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>
</div>
