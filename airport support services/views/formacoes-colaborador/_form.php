<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormacoesColaborador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formacoes-colaborador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_formacao')->textInput() ?>

    <?= $form->field($model, 'id_colaborador')->textInput() ?>

    <?= $form->field($model, 'data_formacao')->textInput() ?>

    <?= $form->field($model, 'caducidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
