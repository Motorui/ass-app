<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ColaboradoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colaboradores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_colaborador') ?>

    <?= $form->field($model, 'nome_colaborador') ?>

    <?= $form->field($model, 'email_colaborador') ?>

    <?= $form->field($model, 'identificao_colaborador') ?>

    <?= $form->field($model, 'identificao_validade') ?>

    <?php // echo $form->field($model, 'status_colaborador') ?>

    <?php // echo $form->field($model, 'num_pw') ?>

    <?php // echo $form->field($model, 'num_cartao') ?>

    <?php // echo $form->field($model, 'validade_cartao') ?>

    <?php // echo $form->field($model, 'id_contrato') ?>

    <?php // echo $form->field($model, 'inicio_contrato') ?>

    <?php // echo $form->field($model, 'fim_contrato') ?>

    <?php // echo $form->field($model, 'id_carga_horaria') ?>

    <?php // echo $form->field($model, 'id_ccusto') ?>

    <?php // echo $form->field($model, 'id_avenca') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
