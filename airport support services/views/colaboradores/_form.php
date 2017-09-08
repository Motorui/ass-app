<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colaboradores-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'nome_colaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_colaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identificao_colaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identificao_validade')->widget(
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

    <?= $form->field($model, 'status_colaborador')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => 'Selecionar Activo ou Inactivo']) ?>

    <!-- Cria contacto para este colaborador -->
    <?= $form->field($contacto, 'contacto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
