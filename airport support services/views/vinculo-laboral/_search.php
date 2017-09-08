<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VinculoLaboralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vinculo-laboral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_vinculo') ?>

    <?= $form->field($model, 'id_colaborador') ?>

    <?= $form->field($model, 'num_pw') ?>

    <?= $form->field($model, 'num_cartao') ?>

    <?= $form->field($model, 'validade_cartao') ?>

    <?php // echo $form->field($model, 'id_contrato') ?>

    <?php // echo $form->field($model, 'inicio_contrato') ?>

    <?php // echo $form->field($model, 'fim_contrato') ?>

    <?php // echo $form->field($model, 'id_carga_horaria') ?>

    <?php // echo $form->field($model, 'id_ccusto') ?>

    <?php // echo $form->field($model, 'id_avenca') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
