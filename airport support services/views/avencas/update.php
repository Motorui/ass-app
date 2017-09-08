<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Avencas */

$this->title = 'Update Avencas: ' . $model->id_avenca;
$this->params['breadcrumbs'][] = ['label' => 'Avencas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_avenca, 'url' => ['view', 'id' => $model->id_avenca]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="avencas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
