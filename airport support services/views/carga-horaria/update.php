<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CargaHoraria */

$this->title = 'Atualizar Cargas Horaria: ' . $model->desc_carga_horaria;
$this->params['breadcrumbs'][] = ['label' => 'Cargas Horarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->desc_carga_horaria, 'url' => ['view', 'id' => $model->id_carga_horaria]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="carga-horaria-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
