<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

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

<div class="contactos-form">

    <?php $form = ActiveForm::begin(); ?>

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
                        'model' => $modelsContactos,
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


    <?php ActiveForm::end(); ?>

</div>
