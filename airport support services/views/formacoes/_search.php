<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormacoesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formacoes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_formacao') ?>

    <?= $form->field($model, 'nome_formacao') ?>

    <?= $form->field($model, 'sigla_formacao') ?>

    <?= $form->field($model, 'validade_formacao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
