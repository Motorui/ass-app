<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contratos */

$this->title = 'Atualiza tipo de Contrato: ' . $model->tipo_contrato;
$this->params['breadcrumbs'][] = ['label' => 'Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipo_contrato, 'url' => ['view', 'id' => $model->id_contrato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contratos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
