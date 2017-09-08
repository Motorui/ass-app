<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ColaboradoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colaboradores-search">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search pull-right">

        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'procuraGlobal', [
            'template' => '<div class="input-group">{input}<span class="input-group-btn">' .
            Html::submitButton('Procurar', ['class' => 'btn btn-default']) .
            '</span></div>',
        ])->textInput(['placeholder' => 'Procurar'])->textInput()->label('') ?>

    </div>
</div>
        <?php ActiveForm::end(); ?>
<div class="clearfix"></div>
<p></p>