<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CentrosCusto */

$this->title = 'Atualiza Centro de Custo: ' . $model->nome_ccusto;
$this->params['breadcrumbs'][] = ['label' => 'Centros Custos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_ccusto, 'url' => ['view', 'id' => $model->id_ccusto]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="centros-custo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
