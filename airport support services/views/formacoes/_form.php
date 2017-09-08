<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formacoes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formacoes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_formacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sigla_formacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'validade_formacao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
