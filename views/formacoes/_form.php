<?php

use yii\helpers\Html;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;

/* @var $this yii\web\View */
/* @var $model app\models\Formacoes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formacoes-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'formacoesForm']); ?>

    <?= FormGrid::widget([
      'model'=>$model,
      'form'=>$form,
      'autoGenerateColumns'=>true,
      'rows'=>[
        [
          'attributes'=>[
            'nome_formacao'=>['type'=>Form::INPUT_TEXT,],
            'sigla_formacao'=>['type'=>Form::INPUT_TEXT,],
            'validade_formacao'=>['type'=>Form::INPUT_TEXT,],
          ],
        ],
      ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
