<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formacoes */

$this->title = 'Atualiza Formação: ' . $model->nome_formacao;
$this->params['breadcrumbs'][] = ['label' => 'Formacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_formacao, 'url' => ['view', 'id' => $model->id_formacao]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="formacoes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
