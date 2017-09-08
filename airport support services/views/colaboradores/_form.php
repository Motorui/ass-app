<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use app\models\Colaboradores;
use app\models\Contratos;
use app\models\CargaHoraria;
use app\models\CentrosCusto;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */
/* @var $form yii\widgets\ActiveForm */
$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="colaboradores-form">
    
        <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id' => 'dynamic-form']); ?>

        <?= $form->field($model, 'nome_colaborador')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email_colaborador')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'identificao_colaborador')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'identificao_validade')->widget(
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

        <?= $form->field($model, 'status_colaborador')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => 'Selecionar Activo ou Inactivo']) ?>         

        <!-- Cria contactos para este colaborador -->

            <div class="panel panel-default">
                <div class="panel-heading"><h4><i class="glyphicon glyphicon-phone"></i> Contactos</h4></div>
                <div class="panel-body">
                     <?php DynamicFormWidget::begin([
                        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                        'widgetBody' => '.container-items', // required: css class selector
                        'widgetItem' => '.item', // required: css class
                        'limit' => 4, // the maximum times, an element can be cloned (default 999)
                        'min' => 1, // 0 or 1 (default 1)
                        'insertButton' => '.add-item', // css class
                        'deleteButton' => '.remove-item', // css class
                        'model' => $modelsContactos[0],
                        'formId' => 'dynamic-form',
                        'formFields' => [
                            'contacto',
                        ],

                    ]); ?>

                    <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsContactos as $i => $modelContactos): ?>
                        <div class="item panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Contacto</h3>
                                <div class="pull-right">
                                    <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                    // necessary for update action.
                                    if (! $modelContactos->isNewRecord) {
                                        echo Html::activeHiddenInput($modelContactos, "[{$i}]id_colaborador");
                                    }
                                ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?= $form->field($modelContactos, "[{$i}]contacto")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <?php DynamicFormWidget::end(); ?>
                </div>
            </div>

    <!-- Vinvulo laboral -->          
            <?= $form->field($modelVinculoLaboral, 'num_pw')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelVinculoLaboral, 'num_cartao')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelVinculoLaboral, 'validade_cartao')->widget(
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

            <?= $form->field($modelVinculoLaboral, 'id_contrato')->dropDownList(
                ArrayHelper::map(Contratos::find()->all(),'id_contrato', 'tipo_contrato'),
                ['prompt'=>'Tipo de Contracto']
            ) ?>

            <?= $form->field($modelVinculoLaboral, 'inicio_contrato')->widget(
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

            <?= $form->field($modelVinculoLaboral, 'fim_contrato')->widget(
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

            <?= $form->field($modelVinculoLaboral, 'id_carga_horaria')->dropDownList(
                ArrayHelper::map(CargaHoraria::find()->all(),'id_carga_horaria', 'desc_carga_horaria'),
                ['prompt'=>'Carga Horária']
            ) ?>

            <?= $form->field($modelVinculoLaboral, 'id_ccusto')->dropDownList(
                ArrayHelper::map(CentrosCusto::find()->all(),'id_ccusto', 'nome_ccusto'),
                ['prompt'=>'Centro de Custo']
            ) ?>

            <?= $form->field($modelVinculoLaboral, 'id_avenca')->textInput() ?>
        </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>