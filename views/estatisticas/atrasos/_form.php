<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Atrasos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atrasos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_atraso')->textInput() ?>

    <?= $form->field($model, 'cia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_voo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_atraso')->dropDownList([ 'EMBARQUE' => 'EMBARQUE', 'DESEMBARQUE' => 'DESEMBARQUE', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'min_imputados')->textInput() ?>

    <?= $form->field($model, 'fora_sta')->dropDownList([ 'SIM' => 'SIM', 'NÃO' => 'NÃO', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'voo_rotacao')->textInput() ?>

    <?= $form->field($model, 'un_pen')->textInput() ?>

    <?= $form->field($model, 'nao_refutado')->textInput() ?>

    <?= $form->field($model, 'min_aceites')->textInput() ?>

    <?= $form->field($model, 'observacoes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
