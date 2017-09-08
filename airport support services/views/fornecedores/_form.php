<?php

use yii\helpers\Html;

use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Typeahead;

/* @var $this yii\web\View */
/* @var $model app\models\Fornecedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fornecedores-form">

<?php

    $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL, 'id'=>'fornecedoresform']);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>3,
        'attributes'=>[
            'nome_fornecedor'=>[
                'type'=>Form::INPUT_TEXT,
            ],        
            'contribuinte_fornecedor'=>[
                'type'=>Form::INPUT_TEXT,
            ],
            'status_fornecedor'=>[
                'type'=>Form::INPUT_DROPDOWN_LIST, 
                'items'=>[ 'ativo' => 'Ativo', 'inativo' => 'Inativo', ],
            ],  
        ]
    ]);

    echo Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>1,
        'attributes'=>[
            'morada_fornecedor'=>[
                'type'=>Form::INPUT_TEXT,
            ],        
        ]
    ]);
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Gravar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
