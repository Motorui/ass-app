<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Colaboradores */

$this->title = 'Update Colaboradores: ' . $model->id_colaborador;
$this->params['breadcrumbs'][] = ['label' => 'Colaboradores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_colaborador, 'url' => ['view', 'id' => $model->id_colaborador]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="colaboradores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsContactos' => $modelsContactos,
        'modelVinculoLaboral' => $modelVinculoLaboral,
    ]) ?>

</div>
