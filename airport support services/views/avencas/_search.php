<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvencasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avencas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_avenca') ?>

    <?= $form->field($model, 'id_parque') ?>

    <?= $form->field($model, 'num_avenca') ?>

    <?= $form->field($model, 'data_avenca') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
