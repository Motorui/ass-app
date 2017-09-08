<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parques */

$this->title = 'Atualiza Parque: ' . $model->parque;
$this->params['breadcrumbs'][] = ['label' => 'Parques', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parque, 'url' => ['view', 'id' => $model->id_parque]];
$this->params['breadcrumbs'][] = 'Atualizar'
?>
<div class="parques-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
