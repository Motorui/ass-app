<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Colaboradores;

/* @var $this yii\web\View */
/* @var $model app\models\Contactos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contactos-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'id_colaborador')->dropDownList(
    	ArrayHelper::map(Colaboradores::find()->all(), 'id_colaborador', 'nome_colaborador'),
    	['prompt'=>'Selecionar Colaborador']
    ) ?>

    <?= $form->field($model, 'contacto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
