<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resumo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resumo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'resumo_mes')->textInput() ?>

    <?= $form->field($model, 'total_total')->textInput() ?>

    <?= $form->field($model, 'total_chegadas')->textInput() ?>

    <?= $form->field($model, 'total_partidas')->textInput() ?>

    <?= $form->field($model, 'total_36h')->textInput() ?>

    <?= $form->field($model, 'chegadas_36h')->textInput() ?>

    <?= $form->field($model, 'partidas_36h')->textInput() ?>

    <?= $form->field($model, 'total_90m_36h')->textInput() ?>

    <?= $form->field($model, 'chegadas_90m_36h')->textInput() ?>

    <?= $form->field($model, 'partidas_90m_36h')->textInput() ?>

    <?= $form->field($model, 'total_90m')->textInput() ?>

    <?= $form->field($model, 'chegadas_90m')->textInput() ?>

    <?= $form->field($model, 'partidas_90m')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
