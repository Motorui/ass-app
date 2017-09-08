<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Observacoes */

$this->title = 'Update Observacoes: ' . $model->id_observacao;
$this->params['breadcrumbs'][] = ['label' => 'Observacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_observacao, 'url' => ['view', 'id' => $model->id_observacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="observacoes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
