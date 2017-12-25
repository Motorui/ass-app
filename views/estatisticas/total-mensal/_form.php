<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TotalMensal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="total-mensal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ano')->textInput() ?>

    <?= $form->field($model, 'janeiro')->textInput() ?>

    <?= $form->field($model, 'fevereiro')->textInput() ?>

    <?= $form->field($model, 'marco')->textInput() ?>

    <?= $form->field($model, 'abril')->textInput() ?>

    <?= $form->field($model, 'maio')->textInput() ?>

    <?= $form->field($model, 'junho')->textInput() ?>

    <?= $form->field($model, 'julho')->textInput() ?>

    <?= $form->field($model, 'agosto')->textInput() ?>

    <?= $form->field($model, 'setembro')->textInput() ?>

    <?= $form->field($model, 'outubro')->textInput() ?>

    <?= $form->field($model, 'novembro')->textInput() ?>

    <?= $form->field($model, 'dezembro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
