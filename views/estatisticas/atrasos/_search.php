<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searches\AtrasosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atrasos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_atraso') ?>

    <?= $form->field($model, 'data_atraso') ?>

    <?= $form->field($model, 'cia') ?>

    <?= $form->field($model, 'num_voo') ?>

    <?= $form->field($model, 'tipo_atraso') ?>

    <?php // echo $form->field($model, 'min_imputados') ?>

    <?php // echo $form->field($model, 'fora_sta') ?>

    <?php // echo $form->field($model, 'voo_rotacao') ?>

    <?php // echo $form->field($model, 'un_pen') ?>

    <?php // echo $form->field($model, 'nao_refutado') ?>

    <?php // echo $form->field($model, 'min_aceites') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
