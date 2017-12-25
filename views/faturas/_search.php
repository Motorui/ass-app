<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CentrosCusto;
use app\models\Fornecedores;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\FaturasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faturas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

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

    <?= $form->field($model, 'num_fatura') ?>

    <?php // echo $form->field($model, 'valor_fatura') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
