<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResumoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resumo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'resumo_id') ?>

    <?= $form->field($model, 'resumo_mes') ?>

    <?= $form->field($model, 'total_total') ?>

    <?= $form->field($model, 'total_chegadas') ?>

    <?= $form->field($model, 'total_partidas') ?>

    <?php // echo $form->field($model, 'total_36h') ?>

    <?php // echo $form->field($model, 'chegadas_36h') ?>

    <?php // echo $form->field($model, 'partidas_36h') ?>

    <?php // echo $form->field($model, 'total_90m_36h') ?>

    <?php // echo $form->field($model, 'chegadas_90m_36h') ?>

    <?php // echo $form->field($model, 'partidas_90m_36h') ?>

    <?php // echo $form->field($model, 'total_90m') ?>

    <?php // echo $form->field($model, 'chegadas_90m') ?>

    <?php // echo $form->field($model, 'partidas_90m') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
