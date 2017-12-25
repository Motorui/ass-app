<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searches\TotalMensalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="total-mensal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_total_mensal') ?>

    <?= $form->field($model, 'ano') ?>

    <?= $form->field($model, 'janeiro') ?>

    <?= $form->field($model, 'fevereiro') ?>

    <?= $form->field($model, 'marco') ?>

    <?php // echo $form->field($model, 'abril') ?>

    <?php // echo $form->field($model, 'maio') ?>

    <?php // echo $form->field($model, 'junho') ?>

    <?php // echo $form->field($model, 'julho') ?>

    <?php // echo $form->field($model, 'agosto') ?>

    <?php // echo $form->field($model, 'setembro') ?>

    <?php // echo $form->field($model, 'outubro') ?>

    <?php // echo $form->field($model, 'novembro') ?>

    <?php // echo $form->field($model, 'dezembro') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
