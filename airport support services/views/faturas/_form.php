<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CentrosCusto;
use app\models\Fornecedores;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Faturas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faturas-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']) ?>

    <?= $form->field($model, 'id_ccusto')->dropDownList(ArrayHelper::map(CentrosCusto::find()->select(
            ['id_ccusto', 'num_ccusto', 'nome_ccusto']
        )->all(), 'id_ccusto', 'displayName'),
        ['class' => 'form-control inline-block']) ?>

    <?= $form->field($model, 'tipo_fatura')->dropDownList([ 'Fatura' => 'Fatura', 'Nota de Crédito' => 'Nota de Crédito', ], 
        ['prompt' => '']) ?>

    <?= $form->field($model, 'data_fatura')->widget(
    DatePicker::className(), [
        // inline too, not bad
        'inline' => false, 
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-dd'
        ]
    ]);?>    

    <?= $form->field($model, 'id_fornecedor')->dropDownList(ArrayHelper::map(Fornecedores::find()->select(
            ['id_fornecedor', 'nome_fornecedor']
        )->all(), 'id_fornecedor', 'nome_fornecedor'),
        ['class' => 'form-control inline-block']) ?>    

    <?= $form->field($model, 'num_fatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_fatura')->textInput(['maxlength' => true]) ?>

    <p><div class="form-group">
        
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Gravar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        
    </div></p>

    <?php ActiveForm::end(); ?>

</div>
