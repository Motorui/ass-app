<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VinculoLaboral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vinculo-laboral-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_colaborador')->textInput() ?>

    <?= $form->field($model, 'num_pw')->textInput() ?>

    <?= $form->field($model, 'num_cartao')->textInput() ?>

    <?= $form->field($model, 'validade_cartao')->textInput() ?>

    <?= $form->field($model, 'id_contrato')->textInput() ?>

    <?= $form->field($model, 'inicio_contrato')->textInput() ?>

    <?= $form->field($model, 'fim_contrato')->textInput() ?>

    <?= $form->field($model, 'id_carga_horaria')->textInput() ?>

    <?= $form->field($model, 'id_ccusto')->textInput() ?>

    <?= $form->field($model, 'id_avenca')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
