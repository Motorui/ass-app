<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FornecedoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fornecedores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_fornecedor') ?>

    <?= $form->field($model, 'nome_fornecedor') ?>

    <?= $form->field($model, 'morada_fornecedor') ?>

    <?= $form->field($model, 'contribuinte_fornecedor') ?>

    <?= $form->field($model, 'status_fornecedor') ?>

    <?php // echo $form->field($model, 'data_criacao_fornecedor') ?>

    <?php // echo $form->field($model, 'data_alteracao_fornecedor') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
