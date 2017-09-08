<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Contratos;
use app\models\CargaHoraria;
use app\models\CentrosCusto;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colaboradores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_colaborador')->textInput() ?>

    <?= $form->field($model, 'nome_colaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_colaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identificao_colaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identificao_validade')->textInput() ?>

    <?= $form->field($model, 'status_colaborador')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'num_pw')->textInput() ?>

    <?= $form->field($model, 'num_cartao')->textInput() ?>

    <?= $form->field($model, 'validade_cartao')->textInput() ?>

    <?= $form->field($model, 'id_contrato')->dropDownList(ArrayHelper::map(Contratos::find()->select(
            ['id_contrato', 'tipo_contrato']
        )->all(), 'id_contrato', 'tipo_contrato'),
        ['class' => 'form-control inline-block']) ?>

    <?= $form->field($model, 'inicio_contrato')->textInput() ?>

    <?= $form->field($model, 'fim_contrato')->textInput() ?>

    <?= $form->field($model, 'id_carga_horaria')->dropDownList(ArrayHelper::map(CargaHoraria::find()->select(
            ['id_carga_horaria', 'desc_carga_horaria']
        )->all(), 'id_carga_horaria', 'desc_carga_horaria'),
        ['class' => 'form-control inline-block']) ?>

    <?= $form->field($model, 'id_ccusto')->dropDownList(ArrayHelper::map(CentrosCusto::find()->select(
            ['id_ccusto', 'num_ccusto', 'nome_ccusto']
        )->all(), 'id_ccusto', 'displayName'),
        ['class' => 'form-control inline-block']) ?>

    <?= $form->field($model, 'id_avenca')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
