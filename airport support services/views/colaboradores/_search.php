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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
