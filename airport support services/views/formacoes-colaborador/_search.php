<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormacoesColaboradorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formacoes-colaborador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_fc') ?>

    <?= $form->field($model, 'id_formacao') ?>

    <?= $form->field($model, 'id_colaborador') ?>

    <?= $form->field($model, 'data_formacao') ?>

    <?= $form->field($model, 'caducidade') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
