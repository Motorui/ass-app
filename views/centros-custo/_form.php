<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CentrosCusto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="centros-custo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_ccusto')->textInput() ?>

    <?= $form->field($model, 'nome_ccusto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Gravar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
