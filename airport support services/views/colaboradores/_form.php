<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Typeahead;

use app\models\Contratos;
use app\models\CargaHoraria;
use app\models\CentrosCusto;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colaboradores-form">

    <?php

    $id_ccusto = Yii::$app->getRequest()->getQueryParam('id_ccusto');

    if (!$id_ccusto) {
        $input_id_ccusto = ['type'=>Form::INPUT_DROPDOWN_LIST, 
                        'items'=>ArrayHelper::map(CentrosCusto::find()->select(
                        ['id_ccusto', 'num_ccusto', 'nome_ccusto']
                        )->all(), 'id_ccusto', 'displayName'),];
    }else{
        $input_id_ccusto = ['type'=>Form::INPUT_DROPDOWN_LIST,
                        'items'=>ArrayHelper::map(CentrosCusto::find()->select(
                        ['id_ccusto', 'num_ccusto', 'nome_ccusto']
                        )->where(['id_ccusto'=>$id_ccusto])->all(), 'id_ccusto', 'displayName'),];
    };

    $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'colaboradoresform']);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'nome_colaborador'=>[
                'type'=>Form::INPUT_TEXT,
            ],        
            'email_colaborador'=>[
                'type'=>Form::INPUT_TEXT,
            ],  
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'attributes'=>[
            'identificao_colaborador'=>[
                'type'=>Form::INPUT_TEXT,
            ], 
            'identificao_validade'=>[
                'type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>'\kartik\widgets\DatePicker',
                'options' => [
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ],
                ],
            ],
            'status_colaborador'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>[ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ],
            ],            
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'attributes'=>[
            'num_pw'=>[
                'type'=>Form::INPUT_TEXT,
            ],
            'num_cartao'=>[
                'type'=>Form::INPUT_TEXT,
            ],
            'validade_cartao'=>[
                'type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>'\kartik\widgets\DatePicker',
                'options' => [
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ],
                ],
            ],
        ]
    ]);    

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'attributes'=>[
            'id_contrato'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(Contratos::find()->select(
                ['id_contrato', 'tipo_contrato']
                )->all(), 'id_contrato', 'tipo_contrato'),
            ],
            'inicio_contrato'=>[
                'type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>'\kartik\widgets\DatePicker',
                'options' => [
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ],
                ],
            ],
            'fim_contrato'=>[
                'type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>'\kartik\widgets\DatePicker',
                'options' => [
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ],
                ],
            ],
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'attributes'=>[
            'id_carga_horaria'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(CargaHoraria::find()->select(
                ['id_carga_horaria', 'desc_carga_horaria']
                )->all(), 'id_carga_horaria', 'desc_carga_horaria'),
            ],
            'id_ccusto'=>$input_id_ccusto, 
            'id_avenca'=>[

            ],
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Criar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
