<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VinculoLaboral */

$this->title = 'Update Vinculo Laboral: ' . $model->id_vinculo;
$this->params['breadcrumbs'][] = ['label' => 'Vinculo Laborals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vinculo, 'url' => ['view', 'id' => $model->id_vinculo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vinculo-laboral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
