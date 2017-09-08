<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Colaboradores;
use app\models\Contratos;
use app\models\CargaHoraria;
use app\models\CentrosCusto;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\VinculoLaboral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vinculo-laboral-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'id_colaborador')->dropDownList(
        ArrayHelper::map(Colaboradores::find()->all(),'id_colaborador', 'nome_colaborador'),
        ['prompt'=>'Colaborador']
    ) ?>

    <?= $form->field($model, 'num_pw')->textInput() ?>

    <?= $form->field($model, 'num_cartao')->textInput() ?>

    <?= $form->field($model, 'validade_cartao')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-dd'
            ]
        ]);?>

    <?= $form->field($model, 'id_contrato')->dropDownList(
        ArrayHelper::map(Contratos::find()->all(),'id_contrato', 'tipo_contrato'),
        ['prompt'=>'Tipo de Contracto']
    ) ?>

    <?= $form->field($model, 'inicio_contrato')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-dd'
            ]
        ]);?>

    <?= $form->field($model, 'fim_contrato')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-dd'
            ]
        ]);?>

    <?= $form->field($model, 'id_carga_horaria')->dropDownList(
        ArrayHelper::map(CargaHoraria::find()->all(),'id_carga_horaria', 'desc_carga_horaria'),
        ['prompt'=>'Carga Horária']
    ) ?>

    <?= $form->field($model, 'id_ccusto')->dropDownList(
        ArrayHelper::map(CentrosCusto::find()->all(),'id_ccusto', 'nome_ccusto'),
        ['prompt'=>'Centro de Custo']
    ) ?>

    <?= $form->field($model, 'id_avenca')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
