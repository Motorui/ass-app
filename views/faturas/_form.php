<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use app\models\CentrosCusto;
use app\models\Fornecedores;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Typeahead;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Faturas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faturas-form">

<?php

    if ($id_ccusto = Yii::$app->getRequest()->getQueryParam('id_ccusto')) {
        $input_id_ccusto = ['type'=>Form::INPUT_DROPDOWN_LIST,
                        'items'=>ArrayHelper::map(CentrosCusto::find()->select(
                        ['id_ccusto', 'num_ccusto', 'nome_ccusto']
                        )->where(['id_ccusto'=>$id_ccusto])->all(), 'id_ccusto', 'displayName'),];
    }else{
        $input_id_ccusto = ['type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(CentrosCusto::find()->select(
                ['id_ccusto', 'num_ccusto', 'nome_ccusto']
                )->all(), 'id_ccusto', 'displayName'),];
    };

    $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'faturasform']);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'id_ccusto'=>$input_id_ccusto,        
            'id_fornecedor'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(Fornecedores::find()->select(
                ['id_fornecedor', 'nome_fornecedor']
                )->all(), 'id_fornecedor', 'nome_fornecedor'),

            ],
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'tipo_fatura'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>[ 'Fatura' => 'Fatura', 'Nota de Crédito' => 'Nota de Crédito', ],
            ],
            'data_fatura'=>[
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
            'num_fatura'=>[
                'type'=>Form::INPUT_TEXT,
            ],
            'valor_fatura'=>[
                'type'=>Form::INPUT_TEXT,
            ],
            'actions'=>[
            'type'=>Form::INPUT_RAW, 
            'value'=>'<div style="text-align: left; margin-top: 20px">' . 
                Html::resetButton('Limpar', ['class'=>'btn btn-default']) . ' ' .
                Html::submitButton($model->isNewRecord ? Yii::t('app', 'Criar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) . 
                '</div>'
            ],
        ]
    ]);

    ActiveForm::end();

?>


</div>
