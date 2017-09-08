<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Typeahead;

use app\models\Formacoes;
use app\models\Colaboradores;

/* @var $this yii\web\View */
/* @var $model app\models\FormacoesColaborador */
/* @var $form yii\widgets\ActiveForm */

if ($id_ccusto = Yii::$app->getRequest()->getQueryParam('id_ccusto')) {
	$ListaColaboradores = [
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(Colaboradores::find()->select(
                ['id_colaborador', 'nome_colaborador']
                )->where(['id_ccusto'=>$id_ccusto])->all(), 'id_colaborador', 'nome_colaborador'),
            ];
}else{
	$ListaColaboradores = [
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(Colaboradores::find()->select(
                ['id_colaborador', 'nome_colaborador']
                )->all(), 'id_colaborador', 'nome_colaborador'),
            ];
}
?>

<div class="formacoes-colaborador-form">

    <?php $form = ActiveForm::begin(); 

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'attributes'=>[
            'id_colaborador'=>$ListaColaboradores,
            'id_formacao'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(Formacoes::find()->select(
                ['id_formacao', 'nome_formacao']
                )->all(), 'id_formacao', 'nome_formacao'),
            ],
            'data_formacao'=>[
                'type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>'\kartik\widgets\DatePicker',
                'options' => [
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                    ],
                ],
            ],        
        ]
    ]);

    if (isset($caducidade)) {
    	print_r($caducidade);
    } else {
    	
    };    

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Gravar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
